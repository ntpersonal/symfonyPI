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
    public function editProfile(Request $request, Security $security, ManagerRegistry $doctrine): Response
    {
        $user = $security->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_log_in');
        }

        $form = $this->createForm(PlayerProfileType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->logger->info('Starting profile update process');
                $entityManager = $doctrine->getManager();
                
                // Handle profile picture upload
                $profilePictureFile = $form->get('profilepicture')->getData();
                if ($profilePictureFile) {
                    $this->logger->info('Processing profile picture upload');
                    
                    // Generate a unique filename
                    $fileName = md5(uniqid()).'.'.$profilePictureFile->guessExtension();
                    $uploadDir = $this->getParameter('profile_pictures_directory');
                    
                    // Ensure upload directory exists
                    $this->ensureUploadDirectoryExists($uploadDir);
                    
                    $this->logger->info('Attempting to move file', [
                        'filename' => $fileName,
                        'uploadDir' => $uploadDir,
                        'originalName' => $profilePictureFile->getClientOriginalName(),
                        'mimeType' => $profilePictureFile->getMimeType(),
                        'size' => $profilePictureFile->getSize()
                    ]);
                    
                    // Move the file to the directory where profile pictures are stored
                    try {
                        $profilePictureFile->move($uploadDir, $fileName);
                        
                        // Delete old profile picture if exists
                        if ($user->getProfilepicture()) {
                            $oldFile = $uploadDir.'/'.$user->getProfilepicture();
                            if (file_exists($oldFile)) {
                                unlink($oldFile);
                                $this->logger->info('Deleted old profile picture: ' . $oldFile);
                            }
                        }
                        
                        $user->setProfilepicture($fileName);
                        $this->logger->info('Profile picture updated successfully', [
                            'newFilename' => $fileName,
                            'fullPath' => $uploadDir.'/'.$fileName,
                            'webPath' => 'uploads/profile/'.$fileName
                        ]);
                    } catch (\Exception $e) {
                        $this->logger->error('Error uploading profile picture: ' . $e->getMessage());
                        throw new \Exception('Failed to upload profile picture: ' . $e->getMessage());
                    }
                }

                // Set updated timestamp
                $user->setUpdatedat(new \DateTime());

                // Persist and flush changes
                $this->logger->info('Attempting to save changes to database');
                $entityManager->persist($user);
                $entityManager->flush();
                $this->logger->info('Changes saved successfully');

                $this->addFlash('success', 'Profile updated successfully!');
                return $this->redirectToRoute('app_player_profile');
            } catch (\Exception $e) {
                $this->logger->error('Error in profile update: ' . $e->getMessage());
                $this->addFlash('error', 'Error updating profile: ' . $e->getMessage());
            }
        }

        return $this->render('front_office/player_profile_edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
} 