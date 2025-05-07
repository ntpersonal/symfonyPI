<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/reservation')]
final class ReservationController extends AbstractController
{
    #[Route('/', name: 'app_reservation_index', methods: ['GET'])]
    public function index(ReservationRepository $reservationRepository): Response
    {
        return $this->render('admin_dashboard/reservations/index.html.twig', [
            'reservations' => $reservationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_reservation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reservation = new Reservation();
        $reservation->setDate(new \DateTime());
        
        // Définir explicitement le statut à "pending" (en attente) par défaut
        $reservation->setStatus('pending');
        
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer le statut soumis
            $submittedStatus = $reservation->getStatus();
            
            // Si le statut est différent de "pending", vérifier les conditions
            if ($submittedStatus !== 'pending') {
                // Si le statut est "approuvé", vérifier si l'événement a de la place
                if ($submittedStatus === 'approved') {
                    $event = $reservation->getEvent();
                    
                    // Vérifier si l'événement est complet
                    if ($event->getMaxParticipants() !== null && $event->getCurrentParticipants() >= $event->getMaxParticipants()) {
                        $this->addFlash('error', 'Impossible d\'approuver la réservation : l\'événement est complet.');
                        
                        // Forcer le statut à "en attente"
                        $reservation->setStatus('pending');
                    } else {
                        // Incrémenter le nombre de participants
                        $event->incrementCurrentParticipants();
                    }
                }
            }
            
            $entityManager->persist($reservation);
            $entityManager->flush();

            $this->addFlash('success', 'La réservation a été créée avec succès avec le statut "En attente".');
            return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_dashboard/reservations/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reservation_show', methods: ['GET'])]
    public function show(Reservation $reservation): Response
    {
        return $this->render('admin_dashboard/reservations/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reservation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        // Stocker le statut original pour le comparer après la soumission
        $originalStatus = $reservation->getStatus();
        
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer le nouveau statut
            $newStatus = $reservation->getStatus();
            
            // Si changement de statut
            if ($newStatus !== $originalStatus) {
                // Si on passe à "approved"
                if ($newStatus === 'approved' && $originalStatus !== 'approved') {
                    $event = $reservation->getEvent();
                    
                    // Vérifier si l'événement est complet
                    if ($event->getMaxParticipants() !== null && $event->getCurrentParticipants() >= $event->getMaxParticipants()) {
                        $this->addFlash('error', 'Impossible d\'approuver la réservation : l\'événement est complet.');
                        
                        // Restaurer l'ancien statut
                        $reservation->setStatus($originalStatus);
                    } else {
                        // Incrémenter le nombre de participants
                        $event->incrementCurrentParticipants();
                    }
                } 
                // Si on retire l'approbation
                elseif ($originalStatus === 'approved' && $newStatus !== 'approved') {
                    $event = $reservation->getEvent();
                    $event->decrementCurrentParticipants();
                }
            }
            
            $entityManager->flush();

            $this->addFlash('success', 'La réservation a été mise à jour avec succès.');
            return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_dashboard/reservations/edit.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reservation_delete', methods: ['POST'])]
    public function delete(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservation->getId(), $request->getPayload()->getString('_token'))) {
            // Si la réservation était approuvée, décrémenter le nombre de participants
            if ($reservation->getStatus() === 'approved') {
                $event = $reservation->getEvent();
                $event->decrementCurrentParticipants();
            }
            
            $entityManager->remove($reservation);
            $entityManager->flush();
            
            $this->addFlash('success', 'La réservation a été supprimée avec succès.');
        }

        return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
    }
    
    #[Route('/{id}/approve', name: 'app_reservation_approve', methods: ['POST'])]
    public function approve(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('approve'.$reservation->getId(), $request->getPayload()->getString('_token'))) {
            $oldStatus = $reservation->getStatus();
            
            // Ne rien faire si déjà approuvé
            if ($oldStatus === 'approved') {
                return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
            }
            
            // Vérifier si l'événement est complet
            $event = $reservation->getEvent();
            if ($event->getMaxParticipants() !== null && $event->getCurrentParticipants() >= $event->getMaxParticipants()) {
                $this->addFlash('error', 'Impossible d\'approuver la réservation : l\'événement est complet.');
                return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
            }
            
            $reservation->setStatus('approved');
            $event->incrementCurrentParticipants();
            $entityManager->flush();
            
            $this->addFlash('success', 'La réservation a été approuvée avec succès.');
        }

        return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
    }
    
    #[Route('/{id}/reject', name: 'app_reservation_reject', methods: ['POST'])]
    public function reject(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('reject'.$reservation->getId(), $request->getPayload()->getString('_token'))) {
            $oldStatus = $reservation->getStatus();
            
            // Si était approuvé, décrémenter le nombre de participants
            if ($oldStatus === 'approved') {
                $event = $reservation->getEvent();
                $event->decrementCurrentParticipants();
            }
            
            $reservation->setStatus('rejected');
            $entityManager->flush();
            
            $this->addFlash('success', 'La réservation a été rejetée avec succès.');
        }

        return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
    }
    
    #[Route('/{id}/change-status/{status}', name: 'app_reservation_change_status', methods: ['POST'])]
    public function changeStatus(Request $request, Reservation $reservation, string $status, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('change_status'.$reservation->getId(), $request->getPayload()->getString('_token'))) {
            $allowedStatuses = ['pending', 'approved', 'rejected', 'cancelled'];
            if (!in_array($status, $allowedStatuses)) {
                $this->addFlash('error', 'Statut invalide.');
                return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
            }
            
            $oldStatus = $reservation->getStatus();
            
            // Si on change vers "approved"
            if ($status === 'approved' && $oldStatus !== 'approved') {
                $event = $reservation->getEvent();
                if ($event->getMaxParticipants() !== null && $event->getCurrentParticipants() >= $event->getMaxParticipants()) {
                    $this->addFlash('error', 'Impossible d\'approuver la réservation : l\'événement est complet.');
                    return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
                }
                $event->incrementCurrentParticipants();
            }
            // Si on retire l'approbation
            elseif ($oldStatus === 'approved' && $status !== 'approved') {
                $event = $reservation->getEvent();
                $event->decrementCurrentParticipants();
            }
            
            $reservation->setStatus($status);
            $entityManager->flush();
            
            // Messages adaptés selon le statut
            switch ($status) {
                case 'approved':
                    $this->addFlash('success', 'La réservation a été approuvée avec succès.');
                    break;
                case 'rejected':
                    $this->addFlash('success', 'La réservation a été rejetée.');
                    break;
                case 'cancelled':
                    $this->addFlash('success', 'La réservation a été annulée.');
                    break;
                default:
                    $this->addFlash('success', 'Le statut de la réservation a été mis à jour.');
            }
        }
        
        return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
    }
}
