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

            if (!$imageData || !$liveDescriptor) {
                throw new \InvalidArgumentException('Missing image or descriptor data');
            }

            // Find all users with face data
            $users = $this->userRepository->createQueryBuilder('u')
                ->where('u.faceData IS NOT NULL')
                ->getQuery()
                ->getResult();

            $this->logger->info(sprintf('Found %d users with face data', count($users)));
            $matchedUser = null;
            $highestSimilarity = 0;
            $threshold = 0.4; // More lenient threshold

            foreach ($users as $user) {
                if (!$user->getFaceData()) continue;

                $storedData = json_decode($user->getFaceData(), true);
                if (!$storedData || !isset($storedData['descriptor'])) {
                    $this->logger->warning(sprintf('Invalid face data format for user %d', $user->getId()));
                    continue;
                }
                $storedDescriptor = $storedData['descriptor'];

                try {
                    $similarity = $this->compareFaceDescriptors($liveDescriptor, $storedDescriptor);
                    $this->logger->info(sprintf('Face comparison for user %d: similarity = %f', $user->getId(), $similarity));

                    if ($similarity > $highestSimilarity) {
                        $highestSimilarity = $similarity;
                        $matchedUser = $user;
                    }
                } catch (\Exception $e) {
                    $this->logger->warning(sprintf('Face comparison failed for user %d: %s', $user->getId(), $e->getMessage()));
                    continue;
                }
            }

            if (!$matchedUser || $highestSimilarity < $threshold) {
                $response->setData([
                    'success' => false,
                    'message' => 'Face not recognized',
                    'similarity' => $highestSimilarity
                ]);
                $response->setStatusCode(Response::HTTP_UNAUTHORIZED);
                return $response;
            }

            // Authenticate user
            $token = new UsernamePasswordToken($matchedUser, 'main', $matchedUser->getRoles());
            $this->container->get('security.token_storage')->setToken($token);

            $event = new InteractiveLoginEvent($request, $token);
            $this->eventDispatcher->dispatch($event);

            $response->setData([
                'success' => true,
                'redirectUrl' => $this->generateUrl('app_front_office'),
                'similarity' => $highestSimilarity
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
                'message' => 'An error occurred',
                'error' => $e->getMessage() // Only in dev environment
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