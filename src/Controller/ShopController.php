<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Order;
use App\Entity\Panier;
use App\Form\OrderType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

#[Route('/shop')]
class ShopController extends AbstractController
{
    #[Route('/', name: 'app_shop')]
    public function index(Request $request, ManagerRegistry $doctrine, SessionInterface $session): Response
    {
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
        ]);
    }

    #[Route('/cart', name: 'app_shop_cart')]
    public function cart(SessionInterface $session, ManagerRegistry $doctrine): Response
    {
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
            return $this->redirectToRoute('app_shop_login');
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

    #[Route('/checkout', name: 'app_shop_checkout')]
    public function checkout(Request $request, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_shop_login');
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
        
        return $this->render('shop/checkout.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
