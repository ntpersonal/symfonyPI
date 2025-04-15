<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function checkout(): Response
    {
        return $this->render('front_office_dashboard/checkout.html.twig');
    }

    #[Route('/front/dashboard/cart', name: 'app_cart')]
    public function cart(): Response
    {
        return $this->render('front_office_dashboard/cart.html.twig');
    }

    #[Route('/front/dashboard/contact', name: 'app_front_office_contact')]
    public function contact(): Response
    {
        return $this->render('front_office_dashboard/contact.html.twig');
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
    
    
    

    #[Route('/front/dashboard/faq', name: 'app_faq')]
    public function faq(): Response
    {
        return $this->render('front_office_dashboard/faq.html.twig');
    }
}
