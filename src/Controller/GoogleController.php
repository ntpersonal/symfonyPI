<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\GoogleProfileCompletionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Security;

class GoogleController extends AbstractController
{
    #[Route('/google/complete-profile', name: 'app_google_complete_profile')]
    public function completeProfile(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher,
        Security $security
    ): Response {
        $user = $security->getUser();
        
        if (!$user || !$user->getGoogleId()) {
            return $this->redirectToRoute('app_log_in');
        }
        
        // Check if user has already completed their profile (has password and role)
        if ($user->getPassword() && $user->getRole()) {
            // User has already completed their profile, redirect to home page
            return $this->redirectToRoute('app_home');
        }
        
        $form = $this->createForm(GoogleProfileCompletionType::class, $user);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            
            // Hash the password
            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $form->get('password')->getData()
            );
            $user->setPassword($hashedPassword);
            
            // Set the role
            $user->setRole($form->get('role')->getData());
            
            $entityManager->persist($user);
            $entityManager->flush();
            
            $this->addFlash('success', 'Your profile has been completed successfully!');
            return $this->redirectToRoute('app_front_office');
        }
        
        return $this->render('connect/complete_google_profile.html.twig', [
            'form' => $form->createView(),
        ]);
    }
} 