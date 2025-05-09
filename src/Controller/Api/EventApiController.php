<?php

namespace App\Controller\Api;

use App\Entity\Event;
use App\Repository\EventRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/events')]
class EventApiController extends AbstractController
{
    private $entityManager;
    private $eventRepository;
    private $serializer;
    private $validator;

    public function __construct(
        EntityManagerInterface $entityManager,
        EventRepository $eventRepository,
        SerializerInterface $serializer,
        ValidatorInterface $validator
    ) {
        $this->entityManager = $entityManager;
        $this->eventRepository = $eventRepository;
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    #[Route('/', name: 'api_event_index', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $events = $this->eventRepository->findAll();
        
        $data = [];
        foreach ($events as $event) {
            $data[] = $this->formatEventData($event);
        }
        
        return new JsonResponse(['events' => $data], Response::HTTP_OK);
    }

    #[Route('/active', name: 'api_event_active', methods: ['GET'])]
    public function getActiveEvents(): JsonResponse
    {
        $events = $this->eventRepository->findBy(['status' => 'active']);
        
        $data = [];
        foreach ($events as $event) {
            $data[] = $this->formatEventData($event);
        }
        
        return new JsonResponse(['events' => $data], Response::HTTP_OK);
    }

    #[Route('/search', name: 'api_event_search', methods: ['GET'])]
    public function search(Request $request): JsonResponse
    {
        $query = $request->query->get('q', '');
        
        if (empty($query)) {
            return new JsonResponse(['error' => 'Veuillez fournir un terme de recherche avec le paramètre "q"'], Response::HTTP_BAD_REQUEST);
        }
        
        // Cette méthode devra être implémentée dans le EventRepository
        $events = $this->eventRepository->searchByKeyword($query);
        
        $data = [];
        foreach ($events as $event) {
            $data[] = $this->formatEventData($event);
        }
        
        return new JsonResponse(['events' => $data], Response::HTTP_OK);
    }

    #[Route('/{id}', name: 'api_event_show', methods: ['GET'])]
    public function show(Event $event): JsonResponse
    {
        return new JsonResponse(['event' => $this->formatEventData($event)], Response::HTTP_OK);
    }

    #[Route('/create', name: 'api_event_create', methods: ['POST'])]
    public function create(Request $request, UserRepository $userRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        if (!isset($data['nom']) || !isset($data['description']) || !isset($data['user_id'])) {
            return new JsonResponse(['error' => 'Les champs nom, description et user_id sont requis'], Response::HTTP_BAD_REQUEST);
        }
        
        $user = $userRepository->find($data['user_id']);
        
        if (!$user) {
            return new JsonResponse(['error' => 'Utilisateur non trouvé'], Response::HTTP_NOT_FOUND);
        }
        
        $event = new Event();
        $event->setNom($data['nom']);
        $event->setDescription($data['description']);
        $event->setUser($user);
        $event->setStatus($data['status'] ?? 'pending');
        $event->setCreatedAt(new \DateTime());
        $event->setUpdatedAt(new \DateTime());
        
        if (isset($data['image'])) {
            $event->setImage($data['image']);
        }
        
        if (isset($data['address'])) {
            $event->setAddress($data['address']);
        }
        
        if (isset($data['latitude']) && isset($data['longitude'])) {
            $event->setLatitude($data['latitude']);
            $event->setLongitude($data['longitude']);
        }
        
        if (isset($data['start_time'])) {
            $event->setStartTime(new \DateTime($data['start_time']));
        } else {
            $event->setStartTime(new \DateTime());
        }
        
        if (isset($data['end_time'])) {
            $event->setEndTime(new \DateTime($data['end_time']));
        } else {
            $event->setEndTime((new \DateTime())->modify('+2 hours'));
        }
        
        if (isset($data['break_time'])) {
            $event->setBreakTime(new \DateTime($data['break_time']));
        }
        
        // Validation
        $errors = $this->validator->validate($event);
        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }
            return new JsonResponse(['errors' => $errorMessages], Response::HTTP_BAD_REQUEST);
        }
        
        $this->entityManager->persist($event);
        $this->entityManager->flush();
        
        return new JsonResponse([
            'event' => $this->formatEventData($event),
            'message' => 'Événement créé avec succès'
        ], Response::HTTP_CREATED);
    }

    #[Route('/{id}/update', name: 'api_event_update', methods: ['PUT', 'PATCH'])]
    public function update(Request $request, Event $event, UserRepository $userRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        if (isset($data['nom'])) {
            $event->setNom($data['nom']);
        }
        
        if (isset($data['description'])) {
            $event->setDescription($data['description']);
        }
        
        if (isset($data['status'])) {
            $event->setStatus($data['status']);
        }
        
        if (isset($data['user_id'])) {
            $user = $userRepository->find($data['user_id']);
            if (!$user) {
                return new JsonResponse(['error' => 'Utilisateur non trouvé'], Response::HTTP_NOT_FOUND);
            }
            $event->setUser($user);
        }
        
        if (isset($data['image'])) {
            $event->setImage($data['image']);
        }
        
        if (isset($data['address'])) {
            $event->setAddress($data['address']);
        }
        
        if (isset($data['latitude'])) {
            $event->setLatitude($data['latitude']);
        }
        
        if (isset($data['longitude'])) {
            $event->setLongitude($data['longitude']);
        }
        
        if (isset($data['start_time'])) {
            $event->setStartTime(new \DateTime($data['start_time']));
        }
        
        if (isset($data['end_time'])) {
            $event->setEndTime(new \DateTime($data['end_time']));
        }
        
        if (isset($data['break_time'])) {
            $event->setBreakTime(new \DateTime($data['break_time']));
        }
        
        $event->setUpdatedAt(new \DateTime());
        
        // Validation
        $errors = $this->validator->validate($event);
        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }
            return new JsonResponse(['errors' => $errorMessages], Response::HTTP_BAD_REQUEST);
        }
        
        $this->entityManager->flush();
        
        return new JsonResponse([
            'event' => $this->formatEventData($event),
            'message' => 'Événement mis à jour avec succès'
        ], Response::HTTP_OK);
    }

    #[Route('/{id}/delete', name: 'api_event_delete', methods: ['DELETE'])]
    public function delete(Event $event): JsonResponse
    {
        // Vérifier si l'événement a des réservations
        if (count($event->getReservations()) > 0) {
            return new JsonResponse([
                'error' => 'Impossible de supprimer cet événement car il possède des réservations',
                'reservations_count' => count($event->getReservations())
            ], Response::HTTP_BAD_REQUEST);
        }
        
        $eventId = $event->getId();
        $this->entityManager->remove($event);
        $this->entityManager->flush();
        
        return new JsonResponse([
            'message' => 'Événement supprimé avec succès',
            'id' => $eventId
        ], Response::HTTP_OK);
    }

    /**
     * Formater les données d'un événement pour la réponse JSON
     */
    private function formatEventData(Event $event): array
    {
        return [
            'id' => $event->getId(),
            'nom' => $event->getNom(),
            'description' => $event->getDescription(),
            'image' => $event->getImage(),
            'address' => $event->getAddress(),
            'latitude' => $event->getLatitude(),
            'longitude' => $event->getLongitude(),
            'start_time' => $event->getStartTime() ? $event->getStartTime()->format('Y-m-d H:i:s') : null,
            'break_time' => $event->getBreakTime() ? $event->getBreakTime()->format('Y-m-d H:i:s') : null,
            'end_time' => $event->getEndTime() ? $event->getEndTime()->format('Y-m-d H:i:s') : null,
            'status' => $event->getStatus(),
            'created_at' => $event->getCreatedAt() ? $event->getCreatedAt()->format('Y-m-d H:i:s') : null,
            'updated_at' => $event->getUpdatedAt() ? $event->getUpdatedAt()->format('Y-m-d H:i:s') : null,
            'organizer' => $event->getUser() ? [
                'id' => $event->getUser()->getId(),
                'email' => $event->getUser()->getEmail()
            ] : null,
            'reservations_count' => count($event->getReservations())
        ];
    }
} 