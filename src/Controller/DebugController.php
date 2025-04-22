<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class DebugController extends AbstractController
{
    #[Route('/debug/auth', name: 'app_debug_auth')]
    public function debugAuth(ManagerRegistry $doctrine, Security $security): Response
    {
        $user = $security->getUser();
        $users = $doctrine->getRepository(User::class)->findAll();
        
        return $this->render('debug/auth.html.twig', [
            'current_user' => $user,
            'users' => $users,
            'request_data' => [
                'method' => $_SERVER['REQUEST_METHOD'] ?? 'N/A',
                'uri' => $_SERVER['REQUEST_URI'] ?? 'N/A',
                'post_data' => $_POST,
            ],
        ]);
    }
} 