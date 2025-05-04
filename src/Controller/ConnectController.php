<?php

// src/Controller/ConnectController.php
namespace App\Controller;

use App\Entity\User;
use App\Form\GoogleProfileCompletionType;
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class ConnectController extends AbstractController
{
    #[Route('/connect/google', name: 'connect_google_start')]
    public function connectGoogle(ClientRegistry $clientRegistry): RedirectResponse
    {
        $scopes = [
            'openid',
            'email',
            'profile',
            'https://www.googleapis.com/auth/user.birthday.read'
        ];
        
        return $clientRegistry->getClient('google')->redirect($scopes, []);
    }

    #[Route('/connect/google/check', name: 'connect_google_check')]
    public function connectCheck(): void
    {
        // Symfony will handle this route automatically
    }
    
    #[Route('/complete-google-profile', name: 'complete_google_profile')]
    public function completeGoogleProfile(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher,
        Security $security
    ): Response {
        // Get the current user
        $user = $security->getUser();
        
        // If user is not authenticated, redirect to login
        if (!$user) {
            return $this->redirectToRoute('app_log_in');
        }
        
        // Create the form
        $form = $this->createForm(GoogleProfileCompletionType::class, $user);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            // Hash the password
            $hashedPassword = $passwordHasher->hashPassword($user, $form->get('password')->getData());
            $user->setPassword($hashedPassword);
            
            // Update the user
            $entityManager->flush();
            
            $this->addFlash('success', 'Your profile has been completed successfully!');
            return $this->redirectToRoute('app_front_office');
        }
        
        return $this->render('admin_dashboard/complete-google-profile.html.twig', [
            'form' => $form->createView(),
            'user' => $user
        ]);
    }
}
