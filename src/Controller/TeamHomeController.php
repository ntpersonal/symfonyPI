<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request; // Added missing import
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Team;
use App\Repository\ReclamationRepository; // Added missing import

class TeamHomeController extends AbstractController
{

    #[Route('/Teamhome', name: 'app_home_Team')]
    public function index(Request $request, ReclamationRepository $rep, ManagerRegistry $doctrine): Response
    {
        // Récupérer toutes les équipes depuis la base de données
        $teams = $doctrine->getRepository(Team::class)->findAll();

        return $this->render('/Team/user.html.twig', [
                'controller_name' => 'BackHomeController',
                'page_title' => 'PAGE_ADMIN',
                'active_page' => 'PAGE_ADMIN',
                'teams' => $teams,
        ]);
    }
}