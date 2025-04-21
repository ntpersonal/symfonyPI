<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Panier;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

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
        
        // If any search parameter is provided, use the search method
        if ($searchTerm || $category || $stock) {
            $products = $repository->search($searchTerm, $category, $stock);
        } else {
            $products = $repository->findAll();
        }

        // Get all available category and stock options for the filter dropdowns
        $categories = ['tournement', 'clothes', 'trophies'];
        $stockOptions = ['yes', 'coming', 'no'];
        
        // Check if user is logged in
        $userId = $session->get('user_id');
        $isLoggedIn = $userId ? true : false;
        $userName = $session->get('user_name');
        
        // Get user's cart count if logged in
        $cartCount = 0;
        if ($isLoggedIn) {
            $panierRepository = $doctrine->getRepository(Panier::class);
            $cartItems = $panierRepository->findBy(['user' => $userId, 'status' => 'in_cart']);
            $cartCount = count($cartItems);
        }

        return $this->render('shop/index.html.twig', [
            'products' => $products,
            'searchTerm' => $searchTerm,
            'selectedCategory' => $category,
            'selectedStock' => $stock,
            'categories' => $categories,
            'stockOptions' => $stockOptions,
            'isLoggedIn' => $isLoggedIn,
            'userName' => $userName,
            'cartCount' => $cartCount
        ]);
    }
    
    #[Route('/cart', name: 'app_shop_cart')]
    public function cart(SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        // Check if user is logged in
        $userId = $session->get('user_id');
        if (!$userId) {
            // Redirect to login page if not logged in
            return $this->redirectToRoute('app_shop_login');
        }
        
        // Get the user entity
        $userRepository = $doctrine->getRepository(User::class);
        $user = $userRepository->find($userId);
        
        if (!$user) {
            $this->addFlash('error', 'User not found');
            return $this->redirectToRoute('app_shop');
        }
        
        // Get user's cart items
        $panierRepository = $doctrine->getRepository(Panier::class);
        $cartItems = $panierRepository->findBy(['user' => $user, 'status' => 'in_cart']);
        
        // Calculate total
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->getTotal();
        }
        
        return $this->render('shop/cart.html.twig', [
            'cartItems' => $cartItems,
            'total' => $total,
            'isLoggedIn' => true,
            'userName' => $session->get('user_name'),
            'cartCount' => count($cartItems)
        ]);
    }
    
    #[Route('/cart/remove/{id}', name: 'app_shop_cart_remove')]
    public function removeFromCart(Panier $cartItem, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        // Check if user is logged in
        $userId = $session->get('user_id');
        if (!$userId) {
            // Redirect to login page if not logged in
            return $this->redirectToRoute('app_shop_login');
        }
        
        // Check if this cart item belongs to the logged-in user
        if ($cartItem->getUser()->getId() != $userId) {
            $this->addFlash('error', 'Unauthorized access');
            return $this->redirectToRoute('app_shop');
        }
        
        // Remove the cart item
        $entityManager = $doctrine->getManager();
        $entityManager->remove($cartItem);
        $entityManager->flush();
        
        $this->addFlash('success', 'Item removed from cart');
        
        return $this->redirectToRoute('app_shop_cart');
    }

    #[Route('/add-to-cart/{id}', name: 'app_shop_add_to_cart')]
    public function addToCart(Product $product, Request $request, ManagerRegistry $doctrine, SessionInterface $session): Response
    {
        // Check if user is logged in
        $userId = $session->get('user_id');
        if (!$userId) {
            // Redirect to login page if not logged in
            return $this->redirectToRoute('app_shop_login');
        }
        
        // Check if product is in stock
        if ($product->getStock() !== 'yes') {
            $this->addFlash('error', 'This product is not currently in stock');
            return $this->redirectToRoute('app_shop');
        }
        
        $quantity = $request->request->getInt('quantity', 1);
        
        // Get the user entity
        $userRepository = $doctrine->getRepository(User::class);
        $user = $userRepository->find($userId);
        
        if (!$user) {
            $this->addFlash('error', 'User not found');
            return $this->redirectToRoute('app_shop');
        }
        
        // Check if product already in cart
        $panierRepository = $doctrine->getRepository(Panier::class);
        $existingCartItem = $panierRepository->findOneBy([
            'user' => $user,
            'product' => $product,
            'status' => 'in_cart'
        ]);
        
        $entityManager = $doctrine->getManager();
        
        if ($existingCartItem) {
            // Update quantity if product already in cart
            $existingCartItem->setQuantity($existingCartItem->getQuantity() + $quantity);
            $existingCartItem->setTotal($product->getPriceproduct() * $existingCartItem->getQuantity());
        } else {
            // Create new cart item
            $panier = new Panier();
            $panier->setUser($user);
            $panier->setProduct($product);
            $panier->setQuantity($quantity);
            $panier->setTotal($product->getPriceproduct() * $quantity);
            $panier->setStatus('in_cart');
            
            $entityManager->persist($panier);
        }
        
        $entityManager->flush();
        
        $this->addFlash('success', 'Product added to cart');
        
        // Redirect back to product page or shop page
        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }
    
    #[Route('/{id}', name: 'app_shop_product', methods: ['GET'])]
    public function show(Product $product, SessionInterface $session, ManagerRegistry $doctrine): Response
    {
        // Only display products that are in stock
        if ($product->getStock() === 'no') {
            $this->addFlash('error', 'This product is currently out of stock');
            return $this->redirectToRoute('app_shop');
        }
        
        // Check if user is logged in
        $userId = $session->get('user_id');
        $isLoggedIn = $userId ? true : false;
        $userName = $session->get('user_name');
        
        // Get user's cart count if logged in
        $cartCount = 0;
        if ($isLoggedIn) {
            $panierRepository = $doctrine->getRepository(Panier::class);
            $cartItems = $panierRepository->findBy(['user' => $userId, 'status' => 'in_cart']);
            $cartCount = count($cartItems);
        }

        return $this->render('shop/product.html.twig', [
            'product' => $product,
            'isLoggedIn' => $isLoggedIn,
            'userName' => $userName,
            'cartCount' => $cartCount
        ]);
    }
} 