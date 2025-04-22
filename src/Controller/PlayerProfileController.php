<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\PlayerProfileType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Psr\Log\LoggerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PlayerProfileController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    #[Route('/player/profile', name: 'app_player_profile')]
    public function profile(Security $security, ManagerRegistry $doctrine): Response
    {
        // Get the current user
        $user = $security->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_log_in');
        }

        return $this->render('front_office/player_profile.html.twig', [
            'user' => $user,
        ]);
    }

    private function ensureUploadDirectoryExists(string $directory): void
    {
        if (!file_exists($directory)) {
            $this->logger->info('Creating upload directory: ' . $directory);
            if (!mkdir($directory, 0777, true)) {
                throw new \RuntimeException('Failed to create upload directory: ' . $directory);
            }
        }
    }

    #[Route('/player/profile/edit', name: 'app_player_profile_edit', methods: ['GET', 'POST'])]
    public function editProfile(Request $request, Security $security, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = $security->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_log_in');
        }

        $form = $this->createForm(PlayerProfileType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $entityManager = $doctrine->getManager();

                // Handle profile picture upload
                $profilePictureFile = $form->get('profilepicture')->getData();
                if ($profilePictureFile) {
                    $fileName = md5(uniqid()) . '.' . $profilePictureFile->guessExtension();
                    $uploadDir = $this->getParameter('profile_pictures_directory');
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    $profilePictureFile->move($uploadDir, $fileName);

                    if ($user->getProfilepicture()) {
                        $oldFile = $uploadDir . '/' . $user->getProfilepicture();
                        if (file_exists($oldFile)) {
                            unlink($oldFile);
                        }
                    }

                    $user->setProfilepicture($fileName);
                }

                // Handle password update
                $currentPassword = $form->get('currentPassword')->getData();
                $newPassword = $form->get('newPassword')->getData();

                if ($newPassword) {
                    if (!$passwordHasher->isPasswordValid($user, $currentPassword)) {
                        $this->addFlash('error', 'Current password is incorrect.');
                        return $this->redirectToRoute('app_player_profile_edit');
                    }

                    $hashedPassword = $passwordHasher->hashPassword($user, $newPassword);
                    $user->setPassword($hashedPassword);
                }

                $user->setUpdatedat(new \DateTime());
                $entityManager->persist($user);
                $entityManager->flush();

                $this->addFlash('success', 'Profile updated successfully!');
                return $this->redirectToRoute('app_player_profile');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Error updating profile: ' . $e->getMessage());
            }
        }

        return $this->render('front_office/player_profile_edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
}