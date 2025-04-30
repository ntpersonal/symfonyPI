<?php

namespace App\Controller;

use App\Entity\Panier;
use App\Entity\Order;

use App\Service\EmailService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

// If you have a StripeService, import it here
// use App\Service\StripeService;

#[Route('/payment')]
class PaymentController extends AbstractController
{
    #[Route('/checkout', name: 'payment_checkout', methods: ['GET'])]
    public function checkout(Request $request, ManagerRegistry $doctrine): Response
    {
        $session = $request->getSession();
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        $this->syncSessionCartToPanier($session, $doctrine, $user);

        // Get the current user and their cart (Panier)
        // Get user ID from session or security
        $userId = $this->getUser() ? $this->getUser()->getId() : null;
        $panierRepo = $doctrine->getRepository(Panier::class);
        $panier = $panierRepo->findOneBy(['client_id' => $userId]);

        $cart = $session->get('cart', []);
        if (!$panier || empty($cart)) {
            $this->addFlash('warning', 'Your cart is empty.');
            return $this->redirectToRoute('public_product_index');
        }

        // Prepare cartItems and total for the template
        $cartItems = [];
        $total = 0;
        $productRepo = $doctrine->getRepository(\App\Entity\Product::class);
        foreach ($cart as $productId => $quantity) {
            $product = $productRepo->find($productId);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $quantity
                ];
                $total += $product->getPriceproduct() * $quantity;
            }
        }

        // Render the checkout page (collect address, show cart summary, etc.)
        return $this->render('payment/checkout.html.twig', [
            'cart' => $panier,
            'cartItems' => $cartItems,
            'total' => $total,
        ]);
    }

    #[Route('/process', name: 'payment_process', methods: ['POST'])]
    public function process(Request $request, ManagerRegistry $doctrine/*, StripeService $stripeService*/, EmailService $emailService): Response
    {
        $session = $request->getSession();
        // Get user ID from session or security
        $userId = $this->getUser() ? $this->getUser()->getId() : null;
        $panierRepo = $doctrine->getRepository(Panier::class);
        $panier = $panierRepo->findOneBy(['client_id' => $userId]);
        $cart = $session->get('cart', []);
        if (!$panier || empty($cart)) {
            $this->addFlash('warning', 'Your cart is empty.');
            return $this->redirectToRoute('public_product_index');
        }

        // Collect address, phone, and payment info from the form
        $address = $request->request->get('address');
        $phone = (int)$request->request->get('phone'); // Convert to integer
        $email = $request->request->get('email');
        
        // Ensure we have required information
        if (empty($address) || empty($phone)) {
            $this->addFlash('error', 'Delivery address and phone number are required.');
            return $this->redirectToRoute('payment_checkout');
        }
        // $stripeToken = $request->request->get('stripeToken');

        // --- Stripe payment processing (pseudo-code) ---
        // $charge = $stripeService->charge($panier->getTotal(), $stripeToken);
        // if (!$charge['success']) {
        //     $this->addFlash('error', 'Payment failed: ' . $charge['message']);
        //     return $this->redirectToRoute('payment_checkout');
        // }

        // Create and persist an Order for each cart item
        $entityManager = $doctrine->getManager();
        $productRepo = $doctrine->getRepository(\App\Entity\Product::class);
        $orders = [];
        foreach ($cart as $productId => $quantity) {
            $product = $productRepo->find($productId);
            if ($product) {
                $order = new Order();
                $order->setUser($this->getUser());
                $order->setPanier($panier);
                $order->setProduct($product);
                $order->setQuantityOrder($quantity);
                $order->setTotalAmount($product->getPriceproduct() * $quantity);
                $order->setStatus('paid');
                $order->setDate(new \DateTime());
                $order->setAddress($address);
                $order->setPhone($phone);
                $entityManager->persist($order);
                $orders[] = $order;
            }
        }
        try {
            $entityManager->flush();
        } catch (\Exception $e) {
            $this->addFlash('error', 'Flush failed: ' . $e->getMessage());
        }

        // Send confirmation email with PDF invoice (for the first order)
        if (count($orders) > 0) {
            $emailService->sendOrderConfirmation($orders[0], $email);
        }

        // Optionally, clear the cart
        $session->set('cart', []);
        // $entityManager->flush();

        $this->addFlash('success', 'Payment confirmed and successful!');
        return $this->redirectToRoute('app_shop_cart'); // Redirect to the shop or cart page after payment
    }

    #[Route('/confirm/{id}', name: 'payment_confirm', methods: ['GET'])]
    public function confirm(Order $order): Response
    {
        $this->addFlash('success', 'Payment has been completed successfully!');
        // Display confirmation page
        return $this->render('payment/confirmation.html.twig', [
            'order' => $order,
        ]);
    }

    #[Route('/create-checkout-session', name: 'payment_create_checkout_session', methods: ['POST'])]
    public function createCheckoutSession(Request $request): Response
    {
        // TODO: Add Stripe logic here
        // For now, return a dummy session id
        return $this->json([
            'sessionId' => 'dummy_session_id',
            'success' => true
        ]);
    }

    #[Route('/cancel', name: 'payment_cancel', methods: ['GET'])]
    public function cancel(): Response
    {
        $this->addFlash('info', 'Payment was cancelled.');
        return $this->redirectToRoute('app_shop_cart'); // Change to your cart or home page route
    }

    /**
     * Sync the session cart to the Panier entity for the current user.
     */
    private function syncSessionCartToPanier($session, $doctrine, $user)
    {
        $entityManager = $doctrine->getManager();
        $panierRepo = $doctrine->getRepository(\App\Entity\Panier::class);
        $panier = $panierRepo->findOneBy(['client_id' => $user->getId()]);

        if (!$panier) {
            $panier = new \App\Entity\Panier();
            $panier->setClientId($user->getId());
            $entityManager->persist($panier);
        }

        // Remove existing items
        // PanierItem is removed, so just sync session cart to Panier total
        $cart = $session->get('cart', []);
        $productRepo = $doctrine->getRepository(\App\Entity\Product::class);
        $total = 0;
        $cleanCart = [];
        foreach ($cart as $productId => $quantity) {
            $product = $productRepo->find($productId);
            if ($product) {
                $total += $product->getPriceproduct() * $quantity;
                $cleanCart[$productId] = $quantity;
            }
        }
        $panier->setTotal($total);
        $session->set('cart', $cleanCart);
        $entityManager->persist($panier);
        $entityManager->flush();
    }
}
