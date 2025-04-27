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

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
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

                        // Remove old profile picture if exists
                        if ($user->getProfilepicture()) {
                            $oldFile = $uploadDir . '/' . $user->getProfilepicture();
                            if (file_exists($oldFile)) {
                                unlink($oldFile);
                            }
                        }

                        $user->setProfilepicture($fileName);
                    }

                    // Handle password update
                    $newPassword = $form->get('newPassword')->getData();
                    if ($newPassword) {
                        $currentPassword = $form->get('currentPassword')->getData();

                        if (!$passwordHasher->isPasswordValid($user, $currentPassword)) {
                            $this->addFlash('error', 'Current password is incorrect.');
                            return $this->redirectToRoute('app_player_profile_edit');
                        }

                        $hashedPassword = $passwordHasher->hashPassword($user, $newPassword);
                        $user->setPassword($hashedPassword);
                    }

                    $faceData = $form->get('faceData')->getData();

                    if ($faceData) {
                        try {
                            // Check if it's already a face descriptor JSON
                            if (strpos($faceData, '{') === 0 || strpos($faceData, '[') === 0) {
                                $decoded = json_decode($faceData, true);
                                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                    // Valid face descriptor, proceed
                                    $user->setFaceData($faceData);
                                } else {
                                    throw new \Exception('Invalid face descriptor format');
                                }
                            }
                            // Handle base64 image data
                            else if (strpos($faceData, 'data:image') === 0) {
                                $processedData = $this->processFaceImage($faceData);
                                $user->setFaceData($processedData);
                            }
                        } catch (\Exception $e) {
                            $this->addFlash('error', 'Face data error: '.$e->getMessage());
                        }
                    }

                    // Set the updated timestamp
                    $user->setUpdatedat(new \DateTime());

                    // Persist the updated user entity
                    $entityManager->persist($user);
                    $entityManager->flush();

                    $this->addFlash('success', 'Profile updated successfully!');
                    return $this->redirectToRoute('app_player_profile');
                } catch (\Exception $e) {
                    $this->addFlash('error', 'Error updating profile: ' . $e->getMessage());
                }
            } else {
                // Collect all form errors
                $errors = [];
                foreach ($form->getErrors(true) as $error) {
                    $errors[] = $error->getMessage();
                }
                $this->addFlash('error', 'Form contains errors: ' . implode(', ', $errors));
            }
        }

        return $this->render('front_office/player_profile_edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Processes and validates face image data
     */
    private function processFaceImage(string $imageData): string
    {
        // Remove data URL part
        $imageData = str_replace(['data:image/jpeg;base64,', 'data:image/png;base64,'], '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);

        // Validate base64
        if (base64_decode($imageData, true) === false) {
            throw new \Exception('Invalid image data');
        }

        // Here you would normally generate the face descriptor
        // For now, we'll return the base64 image as-is
        return $imageData;
    }
}