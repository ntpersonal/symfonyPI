<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;

#[Route('/api')]
class FaceRecognitionController extends AbstractController
{
    public function __construct(
        private UserRepository $userRepository,
        private EventDispatcherInterface $eventDispatcher,
        private LoggerInterface $logger
    ) {}

    #[Route('/api/verify-email-for-face-login', name: 'app_verify_email_for_face_login', methods: ['POST'])]
    public function verifyEmailForFaceLogin(Request $request): JsonResponse
    {
        // Immediately set the response type
        $response = new JsonResponse();
        $response->headers->set('Content-Type', 'application/json');

        try {
            $this->logger->info('Email verification for face login started');

            // Verify it's an AJAX request
            if (!$request->isXmlHttpRequest()) {
                throw new \RuntimeException('This route accepts only AJAX requests');
            }

            // Parse JSON content
            $data = json_decode($request->getContent(), true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \InvalidArgumentException('Invalid JSON payload');
            }

            $email = $data['email'] ?? null;

            if (!$email) {
                throw new \InvalidArgumentException('Email is required');
            }

            // Find user by email
            $user = $this->userRepository->findOneBy(['email' => $email]);

            if (!$user) {
                $response->setData([
                    'success' => false,
                    'message' => 'Email not found in our records.'
                ]);
                $response->setStatusCode(Response::HTTP_NOT_FOUND);
                return $response;
            }

            // Check if user has face data
            if (!$user->getFaceData()) {
                $response->setData([
                    'success' => false,
                    'message' => 'This email is not registered for face recognition. Please register your face first.'
                ]);
                $response->setStatusCode(Response::HTTP_FORBIDDEN);
                return $response;
            }

            $response->setData([
                'success' => true,
                'message' => 'Email verified successfully.'
            ]);

            return $response;

        } catch (\InvalidArgumentException $e) {
            $this->logger->error('Validation error: '.$e->getMessage());
            $response->setData([
                'success' => false,
                'message' => $e->getMessage()
            ]);
            $response->setStatusCode(Response::HTTP_BAD_REQUEST);
            return $response;
        } catch (\Exception $e) {
            $this->logger->error('Email verification error: '.$e->getMessage());
            $response->setData([
                'success' => false,
                'message' => 'An error occurred during email verification. Please try again.'
            ]);
            $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            return $response;
        }
    }

    #[Route('/api/face-login', name: 'app_face_login', methods: ['POST'])]
    public function faceLogin(Request $request): JsonResponse
    {
        // Immediately set the response type
        $response = new JsonResponse();
        $response->headers->set('Content-Type', 'application/json');

        try {
            $this->logger->info('Face login attempt started');

            // Verify it's an AJAX request
            if (!$request->isXmlHttpRequest()) {
                throw new \RuntimeException('This route accepts only AJAX requests');
            }

            // Parse JSON content
            $data = json_decode($request->getContent(), true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \InvalidArgumentException('Invalid JSON payload');
            }

            $imageData = $data['image'] ?? null;
            $liveDescriptor = $data['descriptor'] ?? null;
            $email = $data['email'] ?? null;

            if (!$imageData || !$liveDescriptor || !$email) {
                throw new \InvalidArgumentException('Missing image, descriptor, or email data');
            }

            // Find user by email
            $user = $this->userRepository->findOneBy(['email' => $email]);

            if (!$user) {
                throw new \InvalidArgumentException('User not found');
            }

            // Get stored face data
            $storedData = json_decode($user->getFaceData(), true);
            if (!$storedData || !isset($storedData['descriptor'])) {
                throw new \InvalidArgumentException('Invalid face data format');
            }

            $storedDescriptor = $storedData['descriptor'];

            // Compare face descriptors
            $similarity = $this->compareFaceDescriptors($liveDescriptor, $storedDescriptor);

            $this->logger->info(sprintf('Face comparison for user %d: similarity = %f', $user->getId(), $similarity));

            // Check if similarity is above threshold
            $threshold = 0.4; // More lenient threshold
            if ($similarity < $threshold) {
                $response->setData([
                    'success' => false,
                    'message' => 'We couldn\'t verify your identity. Please try again or use your password to sign in.',
                    'debug' => [
                        'similarity' => $similarity
                    ]
                ]);
                $response->setStatusCode(Response::HTTP_UNAUTHORIZED);
                return $response;
            }

            // Authenticate user
            $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
            $this->container->get('security.token_storage')->setToken($token);

            $event = new InteractiveLoginEvent($request, $token);
            $this->eventDispatcher->dispatch($event);

            $response->setData([
                'success' => true,
                'redirectUrl' => $this->generateUrl('app_front_office'),
                'debug' => [
                    'similarity' => $similarity,
                    'userId' => $user->getId()
                ]
            ]);

            return $response;

        } catch (\InvalidArgumentException $e) {
            $this->logger->error('Validation error: '.$e->getMessage());
            $response->setData([
                'success' => false,
                'message' => $e->getMessage()
            ]);
            $response->setStatusCode(Response::HTTP_BAD_REQUEST);
            return $response;
        } catch (\Exception $e) {
            $this->logger->error('Face login error: '.$e->getMessage());
            $response->setData([
                'success' => false,
                'message' => 'An error occurred during face recognition. Please try again or use your password to sign in.',
                'debug' => [
                    'error' => $e->getMessage() // Only in dev environment
                ]
            ]);
            $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            return $response;
        }
    }

    private function compareFaceDescriptors(array $liveDescriptor, array $storedDescriptor): float
    {
        if (count($liveDescriptor) !== count($storedDescriptor)) {
            throw new \InvalidArgumentException('Descriptor arrays must have the same length');
        }

        // Calculate Euclidean distance between face descriptors
        $sum = 0;
        for ($i = 0; $i < count($liveDescriptor); $i++) {
            $diff = $liveDescriptor[$i] - $storedDescriptor[$i];
            $sum += $diff * $diff;
        }
        $distance = sqrt($sum);

        // Convert distance to similarity score
        // Using a more lenient threshold calculation
        // Distance of 0 = similarity of 1 (perfect match)
        // Distance of 0.6 or more = similarity of 0 (no match)
        return max(0, 1 - ($distance / 0.6));
    }
}