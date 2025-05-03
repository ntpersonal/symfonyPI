<?php

namespace App\Controller;

use App\Repository\MatchesRepository;
use App\Repository\TournoiRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FrontOfficeController extends AbstractController
{
    #[Route('/front/dashboard', name: 'app_front_office')]
    public function index(): Response
    {
        // TODO: Replace this with actual player data from your database
        $player = [
            'id' => 1,
            'name' => 'John Doe',
            'role' => 'FORWARD',
            'description' => 'There are so many sports available in the world nowadays, but we can categorize them by the numbers of players, the three main categories are individual sport, dual sport.'
        ];

        return $this->render('front_office_dashboard/index.html.twig', [
            'controller_name' => 'FrontOfficeController',
            'player' => $player
        ]);
    }

    #[Route('/front/dashboard/home1', name: 'app_home1')]
    public function home1(): Response
    {
        return $this->render('front_office_dashboard/index.html.twig');
    }
    #[Route('/front/dashboard/team', name: 'app_team')]
    public function team(): Response
    {
        return $this->render('front_office_dashboard/team.html.twig');
    }
    #[Route('/front/dashboard/team/{id}', name: 'app_team_details')]
    public function team_details(int $id): Response
    {
        return $this->render('front_office_dashboard/team-details.html.twig', [
            'team' => null // TODO: Fetch team data from database
        ]);
    }
    #[Route('/front/dashboard/history', name: 'app_history')]
    public function history(): Response
    {
        return $this->render('front_office_dashboard/history.html.twig');
    }
    #[Route('/front/dashboard/event', name: 'app_event')]
    public function event(): Response
    {
        return $this->render('front_office_dashboard/event.html.twig');
    }
    #[Route('/front/dashboard/event/{id}', name: 'app_event_details')]
    public function event_details(int $id): Response
    {
        return $this->render('front_office_dashboard/event-details.html.twig', [
            'event' => null // TODO: Fetch team data from database
        ]);
    }
    #[Route('/front/dashboard/error', name: 'app_error')]
    public function error(): Response
    {
        return $this->render('front_office_dashboard/error.html.twig');
    }
    #[Route('/front/dashboard/match_schedule', name: 'app_match_schedule')]
    public function match_schedule(): Response
    {
        return $this->render('front_office_dashboard/match-schedule.html.twig');
    }
    #[Route('/front/dashboard/match_result', name: 'app_match_result')]
    public function match_result(): Response
    {
        return $this->render('front_office_dashboard/match-result.html.twig');
    }
    #[Route('/front/dashboard/gallery', name: 'app_gallery')]
    public function gallery(): Response
    {
        return $this->render('front_office_dashboard/gallery.html.twig');
    }
    #[Route('/front/dashboard/sponsored', name: 'app_sponsored')]
    public function sponsored(): Response
    {
        return $this->render('front_office_dashboard/sponsored.html.twig');
    }
    #[Route('/front/dashboard/awards', name: 'app_awards')]
    public function awards(): Response
    {
        return $this->render('front_office_dashboard/awards.html.twig');
    }
    #[Route('/front/dashboard/home2', name: 'app_home2')]
    public function home2(): Response
    {
        return $this->render('front_office_dashboard/index-two.html.twig');
    }

    #[Route('/front/dashboard/home3', name: 'app_home3')]
    public function home3(): Response
    {
        return $this->render('front_office_dashboard/index-three.html.twig');
    }

    #[Route('/front/dashboard/checkout', name: 'app_checkout')]
    public function checkout(Request $request, ManagerRegistry $doctrine): Response
    {
        $session = $request->getSession();
        $cart = $session->get('cart', []);
        
        // Get cart items for the order summary
        $cartItems = [];
        $cartTotal = 0;
        
        $productRepo = $doctrine->getRepository(\App\Entity\Product::class);
        foreach ($cart as $productId => $quantity) {
            $product = $productRepo->find($productId);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $quantity
                ];
                $cartTotal += $product->getPriceproduct() * $quantity;
            }
        }
        
        return $this->render('front_office_dashboard/checkout.html.twig', [
            'cart_items' => $cartItems,
            'cart_total' => $cartTotal,
        ]);
    }

    #[Route('/front/dashboard/cart', name: 'app_cart')]
    public function cart(): Response
    {
        return $this->render('front_office_dashboard/cart.html.twig');
    }


    #[Route('/front/dashboard/score', name: 'app_score')]
    public function score(): Response
    {
        return $this->render('front_office_dashboard/score.html.twig');
    }

    #[Route('/front/dashboard/player/{id}', name: 'app_player_details')]
    public function playerDetails(int $id): Response
    {
        return $this->render('front_office_dashboard/player-details.html.twig', [
            'player' => null // TODO: Fetch player data from database
        ]);
    }

    #[Route('/front/dashboard/category/{id}', name: 'app_category_details')]
    public function categoryDetails(int $id): Response
    {
        return $this->render('front_office_dashboard/category-details.html.twig', [
            'category' => null // TODO: Fetch category data from database
        ]);
    }
    #[Route('/front/dashboard/blog', name: 'app_blog_front')]
    public function blog(): Response
    {
        return $this->render('front_office_dashboard/blog.html.twig');
    }
    #[Route('/front/dashboard/blog/{id}', name: 'app_blog_front_details')]
    public function blogDetails(int $id): Response
    {
        return $this->render('front_office_dashboard/blog-details.html.twig', [
            'blog' => null // TODO: Fetch blog data from database
        ]);
    }
   
    #[Route('/front/dashboard/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('front_office_dashboard/about.html.twig');
    }

    #[Route('/front/dashboard/shop', name: 'app_shop')]
    public function shop(): Response
    {
        return $this->render('front_office_dashboard/shop.html.twig', [
            'products' => [], // TODO: Fetch products from database
            'currentPage' => 1,
            'totalPages' => 1
        ]);
    }

    #[Route('/front/dashboard/product/{id}', name: 'app_product_details')]
    public function productDetails(int $id): Response
    {
        return $this->render('front_office_dashboard/product-details.html.twig', [
            'product' => null // TODO: Fetch product data from database
        ]);
    }
    #[Route('/front/dashboard/thank_you', name: 'app_thank_you')]
    public function thank_you(): Response
    {
        return $this->render('front_office_dashboard/thank-you.html.twig');
    }
    #[Route('/front/dashboard/account', name: 'app_account')]
    public function account(): Response
    {
        return $this->render('front_office_dashboard/account.html.twig');
    }
    
    #[Route('/front/dashboard/checkout/process', name: 'app_shop_checkout_process', methods: ['POST'])]
    public function checkoutProcess(Request $request, ManagerRegistry $doctrine, \App\Service\EmailService $emailService = null): Response
    {
        $session = $request->getSession();
        $cart = $session->get('cart', []);
        
        if (empty($cart)) {
            $this->addFlash('error', 'Your cart is empty');
            return $this->redirectToRoute('app_shop');
        }
        
        // Get form data
        $homeAddress = $request->request->get('homeaddress');
        $phoneNum = $request->request->get('phonenum');
        $email = $request->request->get('email');
        $stripeToken = $request->request->get('stripeToken');
        
        // Validate form data
        if (empty($homeAddress) || empty($phoneNum) || empty($email)) {
            $this->addFlash('error', 'Please fill in all required fields');
            return $this->redirectToRoute('app_checkout');
        }
        
        // Process the order
        $entityManager = $doctrine->getManager();
        $productRepo = $doctrine->getRepository(\App\Entity\Product::class);
        $user = $this->getUser();
        $userId = $user ? $user->getId() : 0;
        
        // Calculate total amount
        $totalAmount = 0;
        foreach ($cart as $productId => $quantity) {
            $product = $productRepo->find($productId);
            if ($product) {
                $totalAmount += $product->getPriceproduct() * $quantity;
                
                // Create order record for each product
                $order = new \App\Entity\Order();
                
                // Set user if available
                if ($user) {
                    $order->setUser($user);
                }
                
                $order->setDate(new \DateTime());
                $order->setQuantityOrder($quantity);
                $order->setProduct($product);
                $order->setStatus('paid'); // Assuming payment is successful
                $order->setTotalAmount($product->getPriceproduct() * $quantity);
                $order->setPhone((int)$phoneNum);
                $order->setAddress($homeAddress);
                
                $entityManager->persist($order);
            }
        }
        
        $entityManager->flush();
        
        // Clear the cart after successful order
        $session->remove('cart');
        
        // Send confirmation email
        try {
            // Get the last created order to send the email
            $lastOrder = null;
            foreach ($entityManager->getRepository(\App\Entity\Order::class)->findBy(
                ['date' => new \DateTime()],
                ['id' => 'DESC'],
                1
            ) as $o) {
                $lastOrder = $o;
                break;
            }
            
            if ($lastOrder && $emailService) {
                // Send the order confirmation email using the injected service
                $emailService->sendOrderConfirmation($lastOrder, $email);
            } else {
                // Fallback to file-based email if no order is found or no email service
                $emailContent = "Thank you for your order!\n\n";
                $emailContent .= "Order Details:\n";
                $emailContent .= "Total Amount: $" . number_format($totalAmount, 2) . "\n";
                $emailContent .= "Delivery Address: $homeAddress\n";
                $emailContent .= "Phone Number: $phoneNum\n";
                
                // Save email to file instead of sending via SMTP
                $emailFilePath = $this->getParameter('kernel.project_dir') . '/var/emails/';
                if (!is_dir($emailFilePath)) {
                    mkdir($emailFilePath, 0777, true);
                }
                
                $filename = 'order_confirmation_' . time() . '_' . uniqid() . '.txt';
                file_put_contents($emailFilePath . $filename, $emailContent);
            }
        } catch (\Exception $e) {
            // Log email error but don't stop the order process
            $logDir = $this->getParameter('kernel.project_dir') . '/var/log';
            if (!is_dir($logDir)) {
                mkdir($logDir, 0777, true);
            }
            
            file_put_contents(
                $logDir . '/email_errors.log',
                date('Y-m-d H:i:s') . ' - Error sending email: ' . $e->getMessage() . "\n",
                FILE_APPEND
            );
        }
        
        $this->addFlash('success', 'Your order has been placed successfully!');
        return $this->redirectToRoute('app_thank_you');
    }
    


    #[Route('/front/dashboard/faq', name: 'app_faq')]
    public function faq(): Response
    {
        return $this->render('front_office_dashboard/faq.html.twig');
    }
    #[Route('/front/dashboard/matches', name: 'app_front_matches')]
public function matches(MatchesRepository $matchesRepo): Response
{
    $matches = $matchesRepo->findBy([], ['matchTime' => 'DESC']);

    return $this->render('front_office_dashboard/matches.html.twig', [
        'matches' => $matches,
    ]);
}

    #[Route('/front/dashboard/tournois', name: 'app_front_tournois')]
    public function tournois(TournoiRepository $tournoiRepo): Response
    {
        // sort by the actual field name "start_date"
        $tournois = $tournoiRepo->findBy([], ['start_date' => 'DESC']);

        return $this->render('front_office_dashboard/tournois.html.twig', [
            'tournois' => $tournois,
        ]);
    }
    #[Route('/front/dashboard/tournois/{id}', name: 'app_front_tournoi_show', methods: ['GET'])]
    public function showTournoi(int $id, TournoiRepository $tournoiRepo): Response
    {
        $tournoi = $tournoiRepo->find($id);
        if (!$tournoi) {
            throw $this->createNotFoundException("Tournament #{$id} not found.");
        }

        return $this->render('front_office_dashboard/tournoi-matches.html.twig', [
            'tournoi' => $tournoi,
        ]);
    }
    #[Route('/front/dashboard/matches/{id}', name: 'app_front_match_show', methods: ['GET'])]
    public function showFrontMatch(int $id, MatchesRepository $matchesRepo): Response
    {
        $match = $matchesRepo->find($id);
        if (!$match) {
            throw $this->createNotFoundException("Match #{$id} not found.");
        }

        return $this->render('front_office_dashboard/match-details.html.twig', [
            'match' => $match,
        ]);
    }
}
