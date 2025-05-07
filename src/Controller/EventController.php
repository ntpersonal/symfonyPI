<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity\Reservation;

#[Route('/admin/event')]
final class EventController extends AbstractController
{
    #[Route('/', name: 'app_event_index', methods: ['GET'])]
    public function index(EventRepository $eventRepository): Response
    {
        // Récupérer tous les événements
        $events = $eventRepository->findAll();
        
        // Récupérer les statistiques des événements
        $eventStats = $eventRepository->getEventStatistics();
        
        // Debug
        // Uncomment to debug
        // dump($events[0] ?? null);
        
        return $this->render('admin_dashboard/events/index.html.twig', [
            'events' => $events,
            'eventStats' => $eventStats
        ]);
    }

    #[Route('/new', name: 'app_event_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $event = new Event();
        $event->setCreatedAt(new \DateTime());
        $event->setUpdatedAt(new \DateTime());
        
        // Pour compatibilité, utiliser event_date si start_time n'existe pas encore
        if (method_exists($event, 'setEvent_date')) {
            $now = new \DateTime();
            $event->setEvent_date($now);
        }
        
        // Debug
        // dump(get_class_methods($event));
        
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement de l'image
            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('imageFile')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                
                // Récupérer manuellement l'extension pour contourner le problème de fileinfo
                $extension = pathinfo($imageFile->getClientOriginalName(), PATHINFO_EXTENSION);
                // Vérifier que l'extension est valide
                if (!in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif'])) {
                    $extension = 'jpg'; // Extension par défaut si non reconnue
                }
                
                $newFilename = $safeFilename.'-'.uniqid().'.'.$extension;

                // Déplacer le fichier dans le répertoire où sont stockées les images
                try {
                    $imageFile->move(
                        $this->getParameter('event_images_directory'),
                        $newFilename
                    );
                    
                    // Mettre à jour l'attribut 'image' pour stocker le chemin de l'image
                    $event->setImage('uploads/event_images/'.$newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Une erreur s\'est produite lors de l\'upload de l\'image');
                }
            }
            
            // Synchronisation event_date avec start_time si nécessaire
            if (method_exists($event, 'setEvent_date') && method_exists($event, 'getStartTime')) {
                $startTime = $event->getStartTime();
                if ($startTime) {
                    $event->setEvent_date($startTime);
                }
            }
            
            $entityManager->persist($event);
            $entityManager->flush();

            $this->addFlash('success', 'Événement créé avec succès.');
            return $this->redirectToRoute('app_event_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_dashboard/events/new.html.twig', [
            'event' => $event,
            'form' => $form,
        ]);
    }

    #[Route('/search', name: 'app_event_search', methods: ['GET'])]
    public function search(Request $request, EventRepository $eventRepository): Response
    {
        $query = $request->query->get('q', '');
        
        $events = $eventRepository->createQueryBuilder('e')
            ->where('LOWER(e.nom) LIKE LOWER(:query)')
            ->orWhere('LOWER(e.address) LIKE LOWER(:query)')
            ->setParameter('query', '%' . $query . '%')
            ->getQuery()
            ->getResult();

        return $this->render('admin_dashboard/events/_event_list.html.twig', [
            'events' => $events,
        ]);
    }

    #[Route('/{id}', name: 'app_event_show', methods: ['GET'])]
    public function show(Event $event): Response
    {
        // Debug
        // dump(get_object_vars($event));
        // dump(get_class_methods($event));
        
        return $this->render('admin_dashboard/events/show.html.twig', [
            'event' => $event,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_event_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Event $event, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $event->setUpdatedAt(new \DateTime());
        
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement de l'image
            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('imageFile')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                
                // Récupérer manuellement l'extension pour contourner le problème de fileinfo
                $extension = pathinfo($imageFile->getClientOriginalName(), PATHINFO_EXTENSION);
                // Vérifier que l'extension est valide
                if (!in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif'])) {
                    $extension = 'jpg'; // Extension par défaut si non reconnue
                }
                
                $newFilename = $safeFilename.'-'.uniqid().'.'.$extension;

                // Déplacer le fichier dans le répertoire où sont stockées les images
                try {
                    $imageFile->move(
                        $this->getParameter('event_images_directory'),
                        $newFilename
                    );
                    
                    // Mettre à jour l'attribut 'image' pour stocker le chemin de l'image
                    $event->setImage('uploads/event_images/'.$newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Une erreur s\'est produite lors de l\'upload de l\'image');
                }
            }
            
            // Synchronisation event_date avec start_time si nécessaire
            if (method_exists($event, 'setEvent_date') && method_exists($event, 'getStartTime')) {
                $startTime = $event->getStartTime();
                if ($startTime) {
                    $event->setEvent_date($startTime);
                }
            }
            
            $entityManager->flush();
            
            $this->addFlash('success', 'Événement mis à jour avec succès.');
            return $this->redirectToRoute('app_event_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_dashboard/events/edit.html.twig', [
            'event' => $event,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_event_delete', methods: ['POST'])]
    public function delete(Request $request, Event $event, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$event->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($event);
            $entityManager->flush();
            $this->addFlash('success', 'Événement supprimé avec succès.');
        }

        return $this->redirectToRoute('app_event_index', [], Response::HTTP_SEE_OTHER);
    }
}
