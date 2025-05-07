<?php

namespace App\Service;

use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class NotificationService
{
    private $eventRepository;
    private $requestStack;

    public function __construct(EventRepository $eventRepository, RequestStack $requestStack)
    {
        $this->eventRepository = $eventRepository;
        $this->requestStack = $requestStack;
    }

    public function getNewEventsCount(): int
    {
        $session = $this->requestStack->getSession();
        
        // Get all events 
        $events = $this->eventRepository->findNewEvents();
        
        // Store all events in session for display in the dropdown
        $newEventsForSession = [];
        
        foreach ($events as $event) {
            // Créer un tableau pour stocker les infos de l'événement dans la session
            $createdTime = null;
            if (method_exists($event, 'getCreatedAt')) {
                $createdTime = $event->getCreatedAt();
            } elseif (method_exists($event, 'getCreated_at')) {
                $createdTime = $event->getCreated_at();
            }
            
            $newEventsForSession[] = [
                'id' => $event->getId(),
                'nom' => $event->getNom(),
                'createdAt' => $createdTime,
                'description' => $event->getDescription(),
                'image' => $event->getImage()
            ];
        }
        
        // Store all events in session
        $session->set('new_events', $newEventsForSession);
        
        // Pour l'affichage de la notification, montrons toujours un nombre fixe
        // Puisque nous voulons toujours afficher les notifications
        return count($newEventsForSession) > 0 ? count($newEventsForSession) : 1;
    }
} 