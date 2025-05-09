<?php

namespace App\Controller\Api;

use App\Entity\Event;
use App\Entity\Reservation;
use App\Entity\User;
use App\Repository\EventRepository;
use App\Repository\ReservationRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/reservations')]
class ReservationApiController extends AbstractController
{
    private $entityManager;
    private $reservationRepository;
    private $serializer;
    private $validator;
    private $security;

    public function __construct(
        EntityManagerInterface $entityManager,
        ReservationRepository $reservationRepository,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        Security $security
    ) {
        $this->entityManager = $entityManager;
        $this->reservationRepository = $reservationRepository;
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->security = $security;
    }

    #[Route('/', name: 'api_reservation_index', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $reservations = $this->reservationRepository->findAll();
        
        $data = [];
        foreach ($reservations as $reservation) {
            $data[] = [
                'id' => $reservation->getId(),
                'event' => [
                    'id' => $reservation->getEvent()->getId(),
                    'name' => $reservation->getEvent()->getNom()
                ],
                'user' => [
                    'id' => $reservation->getUser()->getId(),
                    'email' => $reservation->getUser()->getEmail()
                ],
                'date' => $reservation->getDate()->format('Y-m-d H:i:s'),
                'status' => $reservation->getStatus(),
                'comment' => $reservation->getComment()
            ];
        }
        
        return new JsonResponse(['reservations' => $data], Response::HTTP_OK);
    }

    #[Route('/event/{id}', name: 'api_reservation_by_event', methods: ['GET'])]
    public function getByEvent(Event $event): JsonResponse
    {
        $reservations = $this->reservationRepository->findBy(['event' => $event]);
        
        $data = [];
        foreach ($reservations as $reservation) {
            $data[] = [
                'id' => $reservation->getId(),
                'event' => [
                    'id' => $reservation->getEvent()->getId(),
                    'name' => $reservation->getEvent()->getNom()
                ],
                'user' => [
                    'id' => $reservation->getUser()->getId(),
                    'email' => $reservation->getUser()->getEmail()
                ],
                'date' => $reservation->getDate()->format('Y-m-d H:i:s'),
                'status' => $reservation->getStatus(),
                'comment' => $reservation->getComment()
            ];
        }
        
        return new JsonResponse(['reservations' => $data], Response::HTTP_OK);
    }

    #[Route('/user/{id}', name: 'api_reservation_by_user', methods: ['GET'])]
    public function getByUser(User $user): JsonResponse
    {
        $reservations = $this->reservationRepository->findBy(['user' => $user]);
        
        $data = [];
        foreach ($reservations as $reservation) {
            $data[] = [
                'id' => $reservation->getId(),
                'event' => [
                    'id' => $reservation->getEvent()->getId(),
                    'name' => $reservation->getEvent()->getNom()
                ],
                'user' => [
                    'id' => $reservation->getUser()->getId(),
                    'email' => $reservation->getUser()->getEmail()
                ],
                'date' => $reservation->getDate()->format('Y-m-d H:i:s'),
                'status' => $reservation->getStatus(),
                'comment' => $reservation->getComment()
            ];
        }
        
        return new JsonResponse(['reservations' => $data], Response::HTTP_OK);
    }

    #[Route('/{id}', name: 'api_reservation_show', methods: ['GET'])]
    public function show(Reservation $reservation): JsonResponse
    {
        $data = [
            'id' => $reservation->getId(),
            'event' => [
                'id' => $reservation->getEvent()->getId(),
                'name' => $reservation->getEvent()->getNom()
            ],
            'user' => [
                'id' => $reservation->getUser()->getId(),
                'email' => $reservation->getUser()->getEmail()
            ],
            'date' => $reservation->getDate()->format('Y-m-d H:i:s'),
            'status' => $reservation->getStatus(),
            'comment' => $reservation->getComment()
        ];
        
        return new JsonResponse(['reservation' => $data], Response::HTTP_OK);
    }

    #[Route('/create', name: 'api_reservation_create', methods: ['POST'])]
    public function create(Request $request, EventRepository $eventRepository, UserRepository $userRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        if (!isset($data['event_id']) || !isset($data['user_id'])) {
            return new JsonResponse(['error' => 'Les identifiants d\'événement et d\'utilisateur sont requis'], Response::HTTP_BAD_REQUEST);
        }
        
        $event = $eventRepository->find($data['event_id']);
        $user = $userRepository->find($data['user_id']);
        
        if (!$event) {
            return new JsonResponse(['error' => 'Événement non trouvé'], Response::HTTP_NOT_FOUND);
        }
        
        if (!$user) {
            return new JsonResponse(['error' => 'Utilisateur non trouvé'], Response::HTTP_NOT_FOUND);
        }
        
        $reservation = new Reservation();
        $reservation->setEvent($event);
        $reservation->setUser($user);
        $reservation->setDate(new \DateTime());
        
        // Ensure status is always set, default to 'pending' if not provided
        $status = isset($data['status']) && !empty($data['status']) ? $data['status'] : 'pending';
        $reservation->setStatus($status);
        
        if (isset($data['comment'])) {
            $reservation->setComment($data['comment']);
        }
        
        $this->entityManager->persist($reservation);
        $this->entityManager->flush();
        
        $responseData = [
            'id' => $reservation->getId(),
            'event' => [
                'id' => $reservation->getEvent()->getId(),
                'name' => $reservation->getEvent()->getNom()
            ],
            'user' => [
                'id' => $reservation->getUser()->getId(),
                'email' => $reservation->getUser()->getEmail()
            ],
            'date' => $reservation->getDate()->format('Y-m-d H:i:s'),
            'status' => $reservation->getStatus(),
            'comment' => $reservation->getComment()
        ];
        
        return new JsonResponse(['reservation' => $responseData, 'message' => 'Réservation créée avec succès'], Response::HTTP_CREATED);
    }

    #[Route('/{id}/update', name: 'api_reservation_update', methods: ['PUT', 'PATCH'])]
    public function update(Request $request, Reservation $reservation): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        if (isset($data['date'])) {
            try {
                $reservation->setDate(new \DateTime($data['date']));
            } catch (\Exception $e) {
                return new JsonResponse(['error' => 'Format de date invalide'], Response::HTTP_BAD_REQUEST);
            }
        }
        
        // Only update status if it's provided and not null or empty
        if (isset($data['status']) && !empty($data['status'])) {
            $reservation->setStatus($data['status']);
        }
        
        if (isset($data['comment'])) {
            $reservation->setComment($data['comment']);
        }
        
        $this->entityManager->flush();
        
        $responseData = [
            'id' => $reservation->getId(),
            'event' => [
                'id' => $reservation->getEvent()->getId(),
                'name' => $reservation->getEvent()->getNom()
            ],
            'user' => [
                'id' => $reservation->getUser()->getId(),
                'email' => $reservation->getUser()->getEmail()
            ],
            'date' => $reservation->getDate()->format('Y-m-d H:i:s'),
            'status' => $reservation->getStatus(),
            'comment' => $reservation->getComment()
        ];
        
        return new JsonResponse(['reservation' => $responseData, 'message' => 'Réservation mise à jour avec succès'], Response::HTTP_OK);
    }

    #[Route('/{id}/delete', name: 'api_reservation_delete', methods: ['DELETE'])]
    public function delete(Reservation $reservation): JsonResponse
    {
        // Si la réservation était approuvée, décrémenter le nombre de participants
        if ($reservation->getStatus() === 'approved') {
            $event = $reservation->getEvent();
            $event->decrementCurrentParticipants();
        }
        
        $this->entityManager->remove($reservation);
        $this->entityManager->flush();
        
        return new JsonResponse(['message' => 'Réservation supprimée avec succès'], Response::HTTP_OK);
    }
    
    #[Route('/{id}/change-status', name: 'api_reservation_change_status', methods: ['PATCH'])]
    public function changeStatus(Request $request, Reservation $reservation): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        if (!isset($data['status']) || empty($data['status'])) {
            return new JsonResponse(['error' => 'Le statut est requis et ne peut pas être vide'], Response::HTTP_BAD_REQUEST);
        }
        
        $allowedStatuses = ['pending', 'approved', 'rejected', 'cancelled'];
        if (!in_array($data['status'], $allowedStatuses)) {
            return new JsonResponse(['error' => 'Statut invalide. Les statuts autorisés sont: ' . implode(', ', $allowedStatuses)], Response::HTTP_BAD_REQUEST);
        }
        
        $event = $reservation->getEvent();
        $oldStatus = $reservation->getStatus();
        $newStatus = $data['status'];
        
        // Vérifier si l'événement est complet lors de l'approbation
        if ($newStatus === 'approved' && $oldStatus !== 'approved') {
            if ($event->getMaxParticipants() !== null && $event->getCurrentParticipants() >= $event->getMaxParticipants()) {
                return new JsonResponse(['error' => 'Désolé, l\'événement est complet.'], Response::HTTP_BAD_REQUEST);
            }
            $event->incrementCurrentParticipants();
        }
        // Décrémenter si on retire l'approbation
        elseif ($oldStatus === 'approved' && $newStatus !== 'approved') {
            $event->decrementCurrentParticipants();
        }
        
        $reservation->setStatus($newStatus);
        
        if (isset($data['comment'])) {
            $reservation->setComment($data['comment']);
        }
        
        $this->entityManager->flush();
        
        $responseData = [
            'id' => $reservation->getId(),
            'event' => [
                'id' => $reservation->getEvent()->getId(),
                'name' => $reservation->getEvent()->getNom(),
                'current_participants' => $event->getCurrentParticipants(),
                'max_participants' => $event->getMaxParticipants()
            ],
            'user' => [
                'id' => $reservation->getUser()->getId(),
                'email' => $reservation->getUser()->getEmail()
            ],
            'date' => $reservation->getDate()->format('Y-m-d H:i:s'),
            'status' => $reservation->getStatus(),
            'comment' => $reservation->getComment()
        ];
        
        return new JsonResponse(['reservation' => $responseData, 'message' => 'Statut de la réservation mis à jour avec succès'], Response::HTTP_OK);
    }
} 