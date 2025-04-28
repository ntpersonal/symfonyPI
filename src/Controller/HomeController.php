<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('Home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    

    #[Route('/matches', name: 'app_matches')]
    public function matches(): Response
    {
        return $this->render('Home/matches.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/players', name: 'app_players')]
    public function players(): Response
    {
        return $this->render('Home/players.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/blog', name: 'app_blog')]
    public function blog(): Response
    {
        return $this->render('Home/blog.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


    #[Route('/single', name: 'app_single')]
    public function single(): Response
    {
        return $this->render('Home/single.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
