<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Order;
use App\Entity\Panier;
use App\Entity\TeamRequest;
use App\Entity\User;
use App\Form\OrderType;
use App\Service\ImageSearchService;
use App\Service\DeepSeekImageService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\String\Slugger\SluggerInterface;



#[Route('/shop')]
class ShopController extends AbstractController
{
    private function getTeamRequestsData(?User $user, EntityManagerInterface $em): array
    {
        if (!$user) {
            return ['teamRequests' => [], 'playerRequests' => []];
        }

        $team = $user->getTeam();

        // only users with ROLE_ORGANIZER see team requests
        $teamRequests = [];
        if ($this->isGranted('ROLE_ORGANIZER') && $team) {
            $teamRequests = $em->getRepository(TeamRequest::class)->findBy([
                'team'   => $team,
                'status' => 'pending',
            ]);
        }

        // only users with ROLE_PLAYER see their own requests
        $playerRequests = [];
        if ($this->isGranted('ROLE_PLAYER')) {
            $playerRequests = $em->getRepository(TeamRequest::class)->findBy([
                'player' => $user,
                'status' => 'pending',
            ]);
        }

        return [
            'teamRequests'   => $teamRequests,
            'playerRequests' => $playerRequests,
        ];
    }


    #[Route('/', name: 'app_shop')]
    public function index(Request $request, ManagerRegistry $doctrine, SessionInterface $session, Security $security,
                          EntityManagerInterface $em): Response
    {

        /** @var User|null $user */
        $user = $security->getUser();
        $data = $this->getTeamRequestsData($user, $em);
        $searchTerm = $request->query->get('search');
        $category = $request->query->get('category');
        $stock = $request->query->get('stock');
        
        $repository = $doctrine->getRepository(Product::class);
        
        // Use the search method from ProductRepository
        $products = $repository->search($searchTerm, $category, $stock);
        
        // Get cart items count from session
        $cart = $session->get('cart', []);
        $cartCount = array_sum($cart);
        
        return $this->render('shop/index.html.twig', [
            'products' => $products,
            'cartCount' => $cartCount,
            'searchTerm' => $searchTerm,
            'selectedCategory' => $category,
            'selectedStock' => $stock,
            'imageSearch' => false,
            'teamRequests'    => $data['teamRequests'],
            'playerRequests'  => $data['playerRequests'],
        ]);
    }
    
    #[Route('/image-search', name: 'app_shop_image_search')]
    public function imageSearch(Request $request, ManagerRegistry $doctrine, SessionInterface $session, SluggerInterface $slugger, DeepSeekImageService $imageAnalysisService): Response
    {
        $imageFile = $request->files->get('image_search');
        $category = $request->query->get('category');
        $stock = $request->query->get('stock');
        
        $products = [];
        $uploadedImagePath = null;
        $analysisResults = null;
        
        if ($imageFile) {
            $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
            
            // Move the file to the temporary directory
            try {
                $tempDir = $this->getParameter('kernel.project_dir') . '/public/uploads/temp';
                if (!file_exists($tempDir)) {
                    mkdir($tempDir, 0777, true);
                }
                
                $imageFile->move($tempDir, $newFilename);
                $uploadedImagePath = $tempDir . '/' . $newFilename;
                
                // Get all products from the repository
                $repository = $doctrine->getRepository(Product::class);
                $allProducts = $repository->findAll();
                
                // Apply category and stock filters if needed
                if ($category || $stock) {
                    $allProducts = $repository->search(null, $category, $stock);
                }
                
                // Analyze the image with our local analysis service
                $analysisResults = $imageAnalysisService->analyzeImage($uploadedImagePath);
                
                // Check if there was an error in the analysis
                if (isset($analysisResults['error'])) {
                    $this->addFlash('warning', 'Image analysis encountered an issue: ' . $analysisResults['error'] . '. Using basic search instead.');
                    // Fallback to basic search if AI fails
                    $products = array_slice($allProducts, 0, min(6, count($allProducts)));
                } else {
                    // Find similar products based on the image analysis
                    $products = $imageAnalysisService->findSimilarProducts($analysisResults, $allProducts);
                    
                    // Add a success message with some of the detected labels
                    if (!empty($analysisResults['labels'])) {
                        $detectedLabels = array_slice($analysisResults['labels'], 0, 3);
                        $labelTexts = array_map(function($label) {
                            return $label['description'];
                        }, $detectedLabels);
                        
                        $this->addFlash('success', 'Image analysis detected: ' . implode(', ', $labelTexts) . '. Showing relevant products.');
                    }
                }
                
                // Clean up the temporary file after processing
                if (file_exists($uploadedImagePath)) {
                    unlink($uploadedImagePath);
                }
                
            } catch (FileException $e) {
                $this->addFlash('error', 'There was an error uploading your image.');
                return $this->redirectToRoute('app_shop');
            }
        } else {
            return $this->redirectToRoute('app_shop');
        }
        
        // Get cart items count from session
        $cart = $session->get('cart', []);
        $cartCount = array_sum($cart);
        
        return $this->render('shop/index.html.twig', [
            'products' => $products,
            'cartCount' => $cartCount,
            'searchTerm' => null,
            'selectedCategory' => $category,
            'selectedStock' => $stock,
            'imageSearch' => true,
            'aiAnalysis' => $analysisResults
        ]);
    }

    #[Route('/cart', name: 'app_shop_cart')]
    public function cart(SessionInterface $session, ManagerRegistry $doctrine,  Security $security,
                         EntityManagerInterface $em): Response
    {
        /** @var User|null $user */
        $user = $security->getUser();
        $data = $this->getTeamRequestsData($user, $em);
        $cart = $session->get('cart', []);
        
        // Get the products from the database
        $products = [];
        $total = 0;
        
        foreach ($cart as $id => $quantity) {
            $product = $doctrine->getRepository(Product::class)->find($id);
            if ($product) {
                $products[] = [
                    'product' => $product,
                    'quantity' => $quantity
                ];
                $total += $product->getPriceproduct() * $quantity;
            }
        }
        
        return $this->render('shop/cart.html.twig', [
            'items' => $products,
            'total' => $total,
            'teamRequests'    => $data['teamRequests'],
            'playerRequests'  => $data['playerRequests'],
        ]);
    }

    #[Route('/add/{id}', name: 'cart_add')]
    public function add($id, Request $request, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        // Get the product
        $product = $doctrine->getRepository(Product::class)->find($id);
        
        if (!$product) {
            throw $this->createNotFoundException('Product not found');
        }
        
        // Check if user is logged in
        if (!$this->getUser()) {
            $this->addFlash('error', 'Please log in to add items to cart');
            return $this->redirectToRoute('app_login');
        }
        
        // Check if product is in stock
        if ($product->getStock() !== 'yes') {
            $this->addFlash('error', 'This product is not currently in stock');
            return $this->redirectToRoute('app_shop');
        }
        
        $quantity = $request->request->getInt('quantity', 1);
        
        // Get the cart from session
        $cart = $session->get('cart', []);
        
        // Add/update the product quantity
        if (!isset($cart[$id])) {
            $cart[$id] = 0;
        }
        $cart[$id] += $quantity;
        
        // Save the cart back to session
        $session->set('cart', $cart);
        
        $this->addFlash('success', 'Product added to cart successfully!');
        
        return $this->redirectToRoute('app_shop');
    }

    #[Route('/update-quantity/{id}', name: 'cart_update_quantity')]
    public function updateQuantity($id, Request $request, SessionInterface $session): Response
    {
        $cart = $session->get('cart', []);
        $quantity = $request->request->getInt('quantity');
        
        if (isset($cart[$id]) && $quantity > 0) {
            $cart[$id] = $quantity;
        }
        
        $session->set('cart', $cart);
        
        return $this->redirectToRoute('app_shop_cart');
    }

    #[Route('/remove/{id}', name: 'cart_remove')]
    public function remove($id, SessionInterface $session): Response
    {
        $cart = $session->get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        
        $session->set('cart', $cart);
        
        return $this->redirectToRoute('app_shop_cart');
    }
    
    #[Route('/clear', name: 'cart_clear')]
    public function clear(SessionInterface $session): Response
    {
        // Remove the cart from the session
        $session->remove('cart');
        
        $this->addFlash('success', 'Cart has been cleared successfully!');
        
        return $this->redirectToRoute('app_shop_cart');
    }

    #[Route('/checkout', name: 'app_shop_checkout')]
    public function checkout(Request $request, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }
        
        $cart = $session->get('cart', []);
        if (empty($cart)) {
            return $this->redirectToRoute('app_shop_cart');
        }
        
        $order = new Order();
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            
            // Process each cart item
            foreach ($cart as $productId => $quantity) {
                $product = $doctrine->getRepository(Product::class)->find($productId);
                if ($product) {
                    $panier = new Panier();
                    $panier->setProduct($product);
                    $panier->setQuantity($quantity);
                    $panier->setOrder($order);
                    $entityManager->persist($panier);
                }
            }
            
            $order->setUser($this->getUser());
            $order->setStatus('pending');
            $order->setOrderDate(new \DateTime());
            
            $entityManager->persist($order);
            $entityManager->flush();
            
            // Clear the cart
            $session->remove('cart');
            
            $this->addFlash('success', 'Order placed successfully!');
            return $this->redirectToRoute('app_shop');
        }
        
        // Get cart items for the order summary
        $cartItems = [];
        $cartTotal = 0;
        
        foreach ($cart as $productId => $quantity) {
            $product = $doctrine->getRepository(Product::class)->find($productId);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $quantity
                ];
                $cartTotal += $product->getPriceproduct() * $quantity;
            }
        }
        
        return $this->render('shop/checkout.html.twig', [
            'form' => $form->createView(),
            'cart_items' => $cartItems,
            'cart_total' => $cartTotal,
        ]);
    }
    
    #[Route('/product/{id}', name: 'app_product_details')]
    public function productDetails(
        $id, 
        ManagerRegistry $doctrine, 
        SessionInterface $session, 
        Request $request, 
        \App\Service\ProductDescriptionGenerator $descriptionGenerator,
        Security $security,
        EntityManagerInterface $em

    ): Response
    {
        /** @var User|null $user */
        $user = $security->getUser();
        $data = $this->getTeamRequestsData($user, $em);
        $product = $doctrine->getRepository(Product::class)->find($id);
        
        if (!$product) {
            throw $this->createNotFoundException('Product not found');
        }
        
        // Get cart items count from session for the header
        $cart = $session->get('cart', []);
        $cartCount = array_sum($cart);
        
        // Check if we need to generate a description
        $generateDescription = $request->query->get('generate_description');
        if ($generateDescription) {
            // Generate the description using the injected service
            $description = $descriptionGenerator->generateDescription(
                $product->getNameproduct(), // Use correct property name
                $product->getCategory()
            );
            
            // Update the product with the new description
            $product->setProductdescription($description);
            
            // Save to database
            $entityManager = $doctrine->getManager();
            $entityManager->persist($product);
            $entityManager->flush();
            
            $this->addFlash('success', 'Product description generated successfully!');
            
            // Redirect to remove the query parameter
            return $this->redirectToRoute('app_product_details', ['id' => $id]);
        }
        
        // Get all products except the current one
        $allProducts = $doctrine->getRepository(Product::class)->findBy(
            ['deleted' => false],
            ['id' => 'DESC']
        );
        
        // Initialize arrays for category matches and other products
        $categoryMatches = [];
        $otherProducts = [];
        
        // Sort products into category matches and others
        foreach ($allProducts as $otherProduct) {
            // Skip the current product
            if ($otherProduct->getId() === $product->getId()) {
                continue;
            }
            
            // Check if it's in the same category
            if ($otherProduct->getCategory() === $product->getCategory()) {
                $categoryMatches[] = $otherProduct;
            } else {
                $otherProducts[] = $otherProduct;
            }
            
            // Limit the number of products in each category to prevent too much processing
            if (count($categoryMatches) >= 5 && count($otherProducts) >= 5) {
                break;
            }
        }
        
        // Shuffle both arrays to add randomness
        shuffle($categoryMatches);
        shuffle($otherProducts);
        
        // Take up to 3 products from the same category
        $relatedProducts = array_slice($categoryMatches, 0, 3);
        
        // If we don't have enough from the same category, add some from other categories
        if (count($relatedProducts) < 3) {
            $neededFromOthers = 3 - count($relatedProducts);
            $relatedProducts = array_merge($relatedProducts, array_slice($otherProducts, 0, $neededFromOthers));
        }
        
        return $this->render('shop/product_details.html.twig', [
            'product' => $product,
            'cartCount' => $cartCount,
            'related_products' => $relatedProducts,
            'teamRequests'    => $data['teamRequests'],
            'playerRequests'  => $data['playerRequests'],
        ]);
    }
}
