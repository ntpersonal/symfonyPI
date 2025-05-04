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
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\TeamRequest;

class PlayerProfileController extends AbstractController
{
    private $logger;


    public function __construct(LoggerInterface $logger,)
    {
        $this->logger = $logger;
      
    }

    #[Route('/player/profile', name: 'app_player_profile')]
    public function profile(Security $security, ManagerRegistry $doctrine, 
    EntityManagerInterface $em): Response
    {
        // Get the current user
         /** @var User|null $user */
        $user = $security->getUser();


       $data = $this->getTeamRequestsData($user, $em);
          
       


        if (!$user) {
            return $this->redirectToRoute('app_log_in');
        }

        return $this->render('front_office/player_profile.html.twig', [
            'user' => $user,
            'teamRequests'    => $data['teamRequests'],
            'playerRequests'  => $data['playerRequests'],
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
    public function editProfile(Request $request, Security $security, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher,
    EntityManagerInterface $em): Response
    {
    /** @var User|null $user */
    $user = $security->getUser();

    $data = $this->getTeamRequestsData($user, $em);
        if (!$user) {
            return $this->redirectToRoute('app_log_in');
        }

        $form = $this->createForm(PlayerProfileType::class, $user);
        $form->handleRequest($request);
        $this->logger->info('Handling profile edit form submission');

        if ($form->isSubmitted()) {
            $this->logger->info('Form submitted');
            $this->logger->info('Form data: ' . json_encode($request->request->all()));
            $this->logger->info('Files: ' . json_encode($_FILES));
            
            if ($form->isValid()) {
                $this->logger->info('Form is valid');
                try {
                    $entityManager = $doctrine->getManager();

                    // Handle profile picture upload
                    $profilePictureFile = $form->get('profilepicture')->getData();
                    $this->logger->info('Profile picture data: ' . ($profilePictureFile ? 'File received' : 'No file'));
                    
                    if ($profilePictureFile) {
                        try {
                            $this->logger->info('Processing profile picture upload');
                            $this->logger->info('Original filename: ' . $profilePictureFile->getClientOriginalName());
                            $this->logger->info('File size: ' . $profilePictureFile->getSize());
                            $this->logger->info('MIME type: ' . $profilePictureFile->getMimeType());
                            
                            $fileName = $this->handleFileUpload($profilePictureFile);
                            $this->logger->info('File uploaded successfully: ' . $fileName);
                            
                            // Remove old profile picture if exists
                            if ($user->getProfilepicture()) {
                                $oldFile = $this->getParameter('profile_pictures_directory') . '/' . $user->getProfilepicture();
                                $this->logger->info('Checking old file: ' . $oldFile);
                                if (file_exists($oldFile)) {
                                    unlink($oldFile);
                                    $this->logger->info('Old file deleted');
                                } else {
                                    $this->logger->info('Old file not found: ' . $oldFile);
                                }
                            }

                            $user->setProfilepicture($fileName);
                            $this->logger->info('Profile picture name set in user entity: ' . $fileName);
                        } catch (\Exception $e) {
                            $this->logger->error('Error uploading profile picture: ' . $e->getMessage());
                            $this->logger->error('Stack trace: ' . $e->getTraceAsString());
                            $this->addFlash('error', 'Error uploading profile picture: ' . $e->getMessage());
                            return $this->redirectToRoute('app_player_profile_edit');
                        }
                    } else {
                        $this->logger->info('No profile picture file provided');
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
                    $this->logger->info('User entity persisted successfully');

                    $this->addFlash('success', 'Profile updated successfully!');
                    return $this->redirectToRoute('app_player_profile');
                } catch (\Exception $e) {
                    $this->logger->error('Error updating profile: ' . $e->getMessage());
                    $this->logger->error('Stack trace: ' . $e->getTraceAsString());
                    $this->addFlash('error', 'Error updating profile: ' . $e->getMessage());
                }
            } else {
                // Collect all form errors
                $errors = [];
                foreach ($form->getErrors(true) as $error) {
                    $this->logger->error('Form error: ' . $error->getMessage());
                    $errors[] = $error->getMessage();
                }
                $this->addFlash('error', 'Form contains errors: ' . implode(', ', $errors));
            }
        }

        return $this->render('front_office/player_profile_edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'teamRequests'    => $data['teamRequests'],
            'playerRequests'  => $data['playerRequests'],
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
    
    /**
     * Handles file upload for profile pictures
     */
    private function handleFileUpload($file)
    {
        try {
            // Generate a unique filename
            $newFilename = md5(uniqid()).'.'.$file->guessExtension();
            $uploadDir = $this->getParameter('profile_pictures_directory');
            
            $this->logger->info('Upload directory: ' . $uploadDir);
            $this->logger->info('New filename: ' . $newFilename);
            
            // Ensure the upload directory exists
            if (!file_exists($uploadDir)) {
                $this->logger->info('Creating upload directory: ' . $uploadDir);
                if (!mkdir($uploadDir, 0777, true)) {
                    $error = error_get_last();
                    $this->logger->error('Failed to create directory: ' . ($error ? $error['message'] : 'Unknown error'));
                    throw new \RuntimeException('Failed to create upload directory: ' . $uploadDir);
                }
            }

            // Check directory permissions
            if (!is_writable($uploadDir)) {
                $this->logger->error('Upload directory is not writable: ' . $uploadDir);
                throw new \RuntimeException('Upload directory is not writable: ' . $uploadDir);
            }

            // Move the file to the upload directory
            $this->logger->info('Moving file to: ' . $uploadDir . '/' . $newFilename);
            $file->move($uploadDir, $newFilename);
            
            if (!file_exists($uploadDir . '/' . $newFilename)) {
                $this->logger->error('File was not successfully moved to destination');
                throw new \RuntimeException('File upload failed: file not found in destination');
            }
            
            $this->logger->info('File successfully uploaded to: ' . $uploadDir . '/' . $newFilename);
            return $newFilename;
        } catch (\Exception $e) {
            $this->logger->error('Error in handleFileUpload: ' . $e->getMessage());
            throw $e;
        }
    }
    private function getTeamRequestsData(?User $user, EntityManagerInterface $em): array
    {
        if (!$user) {
            return ['teamRequests' => [], 'playerRequests' => []];
        }

        $team = $user->getTeam();

        // only users with ROLE_ORGANIZER see team requests
        $teamRequests = [];
        if ($this->isGranted('ROLE_ORGANIZER') && $team) {
            $teamRequests = $em->getRepository(TeamRequest::class)->findBy([
                'team'   => $team,
                'status' => 'pending',
            ]);
        }

        // only users with ROLE_PLAYER see their own requests
        $playerRequests = [];
        if ($this->isGranted('ROLE_PLAYER')) {
            $playerRequests = $em->getRepository(TeamRequest::class)->findBy([
                'player' => $user,
                'status' => 'pending',
            ]);
        }

        return [
            'teamRequests'   => $teamRequests,
            'playerRequests' => $playerRequests,
        ];
    }
}