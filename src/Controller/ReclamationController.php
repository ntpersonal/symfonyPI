<?php

namespace App\Controller;

use App\Entity\Reclamation;
use App\Entity\User;
use App\Entity\Answer;
use App\Form\ReclamationType;
use App\Form\AnswerType;
use App\Repository\ReclamationRepository;
use App\Service\EmailService;
use App\Service\ContentFilterService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reclamation')]
class ReclamationController extends AbstractController
{
    #[Route('/', name: 'reclamation_index', methods: ['GET'])]
    public function index(Request $request, ReclamationRepository $reclamationRepository): Response
    {
        // Récupérer le statut demandé depuis la query string, par défaut afficher toutes
        $statusFilter = $request->query->get('status');
        
        // Préparer les filtres
        $criteria = [];
        if ($statusFilter && in_array($statusFilter, array_keys(Reclamation::getStatusChoices()))) {
            $criteria['status'] = $statusFilter;
        }
        
        // Récupérer les réclamations filtrées ou toutes si pas de filtre
        $reclamations = empty($criteria) 
            ? $reclamationRepository->findBy([], ['created_at' => 'DESC']) 
            : $reclamationRepository->findBy($criteria, ['created_at' => 'DESC']);
        
        return $this->render('reclamation/index.html.twig', [
            'reclamations' => $reclamations,
            'statusChoices' => Reclamation::getStatusChoices(),
            'currentStatus' => $statusFilter,
        ]);
    }
    
    #[Route('/my', name: 'app_reclamation_my')]
    public function myReclamations(Request $request, ReclamationRepository $reclamationRepository): Response
    {
        $user = $this->getUser();
        $statusFilter = $request->query->get('status');
        
        // Critères de base: réclamations de l'utilisateur connecté
        $criteria = ['user' => $user];
        
        // Ajouter le filtre par statut si présent
        if ($statusFilter && in_array($statusFilter, array_keys(Reclamation::getStatusChoices()))) {
            $criteria['status'] = $statusFilter;
        }
        
        $reclamations = $reclamationRepository->findBy(
            $criteria,
            ['created_at' => 'DESC']
        );

        return $this->render('reclamation/user_reclamations.html.twig', [
            'reclamations' => $reclamations,
            'statusChoices' => Reclamation::getStatusChoices(),
            'currentStatus' => $statusFilter,
        ]);
    }


    #[Route('/new', name: 'app_reclamation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ReclamationRepository $reclamationRepository, ContentFilterService $contentFilter, EmailService $emailService): Response
    {
        $reclamation = new Reclamation();
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Vérifier si le message contient des mots inappropriés
            $message = $reclamation->getMessage();
            $badWords = $contentFilter->containsInappropriateContent($message);
            
            if (!empty($badWords)) {
                $badWordsStr = implode(', ', $badWords);
                $this->addFlash('danger', "Votre message contient des mots inappropriés ($badWordsStr). Veuillez les supprimer avant de soumettre.");
                
                return $this->renderForm('reclamation/new.html.twig', [
                    'reclamation' => $reclamation,
                    'form' => $form,
                ]);
            }
            
            $reclamation->setCreatedAt(new \DateTimeImmutable());
            $reclamation->setStatus('En attente');
            $reclamation->setUser($this->getUser());
            
            $reclamationRepository->add($reclamation, true);

            $this->addFlash('success', 'Votre réclamation a été soumise avec succès.');
            
            // Envoyer un email de confirmation
            $emailService->sendReclamationConfirmation($reclamation);

            return $this->redirectToRoute('app_reclamation_user_reclamations', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reclamation/new.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'reclamation_show', methods: ['GET', 'POST'])]
    public function show(Reclamation $reclamation, Request $request, EntityManagerInterface $em): Response
    {
        // Formulaire pour modifier le statut de la réclamation
        $statusForm = $this->createFormBuilder($reclamation)
            ->add('status', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, [
                'choices' => Reclamation::getStatusChoices(),
                'label' => 'Changer le statut',
                'attr' => ['class' => 'form-select']
            ])
            ->getForm();
            
        $statusForm->handleRequest($request);
        
        if ($statusForm->isSubmitted() && $statusForm->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Statut de la réclamation mis à jour.');
            return $this->redirectToRoute('reclamation_show', ['id' => $reclamation->getId()]);
        }
    
        // Préparer une nouvelle réponse
        $answer = new Answer();
        $answer->setReclamation($reclamation);
        $answer->setAdmin($this->getUser());
    
        // Créer le formulaire de réponse
        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($answer);
            
            // Mise à jour automatique du statut à "Résolu" quand une réponse est ajoutée
            $reclamation->setStatus(Reclamation::STATUS_RESOLVED);
            
            $em->flush();
    
            $this->addFlash('success', 'Réponse ajoutée avec succès.');
            return $this->redirectToRoute('reclamation_show', ['id' => $reclamation->getId()]);
        }
    
        return $this->render('reclamation/show.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form->createView(),
            'statusForm' => $statusForm->createView(),
        ]);
    }
    
    #[Route('/front/{id}', name: 'reclamation_show2', methods: ['GET', 'POST'])]
    public function show2(Reclamation $reclamation, Request $request, EntityManagerInterface $em): Response
    {
        // Prepare a new Answer object
        $answer = new Answer();
        $answer->setReclamation($reclamation);
        $answer->setAdmin($this->getUser());
    
        // Create the form
        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($answer);
            
            // Mise à jour automatique du statut à "Résolu" quand une réponse est ajoutée
            $reclamation->setStatus(Reclamation::STATUS_RESOLVED);
            
            $em->flush();
    
            $this->addFlash('success', 'Réponse ajoutée avec succès.');
            return $this->redirectToRoute('reclamation_show2', ['id' => $reclamation->getId()]);
        }
    
        return $this->render('reclamation/show2.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form->createView(),
        ]);
    }
    

    #[Route('/{id}/edit', name: 'reclamation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reclamation $reclamation, EntityManagerInterface $em, ContentFilterService $contentFilterService): Response
    {
        $form = $this->createForm(ReclamationType::class, $reclamation, [
            'include_status' => $this->isGranted('ROLE_ADMIN') // Inclure le champ statut pour les admins
        ]);
        $form->handleRequest($request);

        // Variable pour stocker les mots inappropriés détectés
        $detectedBadWords = [];

        if ($form->isSubmitted()) {
            // Vérifier si le message contient des mots inappropriés
            $message = $reclamation->getMessage();
            $detectedBadWords = $contentFilterService->containsInappropriateContent($message);
            
            // Si des mots inappropriés sont détectés
            if (!empty($detectedBadWords)) {
                // Pour les administrateurs, plus de tolérance sur les mots inappropriés
                if (!$this->isGranted('ROLE_ADMIN') && count($detectedBadWords) > 3) {
                    // Si trop de mots inappropriés pour un utilisateur standard, renvoyer un message d'erreur
                    $this->addFlash('error', 'Votre message contient trop de termes inappropriés. Veuillez le reformuler.');
                    
                    // Renvoyer le formulaire avec la liste des mots détectés
                    return $this->render('reclamation/edit.html.twig', [
                        'form' => $form->createView(),
                        'reclamation' => $reclamation,
                        'bad_words' => $detectedBadWords
                    ]);
                } else {
                    // Option 2: Filtrer automatiquement le message
                    $filteredMessage = $contentFilterService->filterText($message);
                    $reclamation->setMessage($filteredMessage);
                    $this->addFlash('warning', sprintf(
                        'Certains termes inappropriés (%s) ont été automatiquement filtrés de votre message.',
                        implode(', ', $detectedBadWords)
                    ));
                }
            }
            
            // Si le formulaire est valide après filtrage éventuel
            if ($form->isValid()) {
                $em->flush();
                $this->addFlash('success', 'Réclamation mise à jour avec succès.');
                return $this->redirectToRoute('reclamation_index');
            }
        }

        return $this->render('reclamation/edit.html.twig', [
            'form' => $form->createView(),
            'reclamation' => $reclamation,
            'bad_words' => $detectedBadWords,
        ]);
    }

    #[Route('/{id}/delete', name: 'reclamation_delete', methods: ['POST', 'DELETE'])]
    public function delete(Request $request, Reclamation $reclamation, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $reclamation->getId(), $request->request->get('_token'))) {
            $em->remove($reclamation);
            $em->flush();
            $this->addFlash('success', 'Réclamation supprimée avec succès.');
        }

        return $this->redirectToRoute('reclamation_index');
    }
    
    #[Route('/front/{id}/delete', name: 'reclamation_delete2', methods: ['POST', 'DELETE'])]
    public function delete2(Request $request, Reclamation $reclamation, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete2' . $reclamation->getId(), $request->request->get('_token'))) {
            $em->remove($reclamation);
            $em->flush();
            $this->addFlash('success', 'Réclamation supprimée avec succès.');
        }

        return $this->redirectToRoute('app_reclamation_my');
    }

    #[Route('/user/{id}', name: 'reclamation_by_user', methods: ['GET'])]
    public function byUser(Request $request, User $user, ReclamationRepository $repo): Response
    {
        $statusFilter = $request->query->get('status');
        
        // Critères de base: réclamations de l'utilisateur spécifié
        $criteria = ['user' => $user];
        
        // Ajouter le filtre par statut si présent
        if ($statusFilter && in_array($statusFilter, array_keys(Reclamation::getStatusChoices()))) {
            $criteria['status'] = $statusFilter;
        }
        
        $reclamations = $repo->findBy($criteria, ['created_at' => 'DESC']);

        return $this->render('reclamation/user_list.html.twig', [
            'reclamations' => $reclamations,
            'user' => $user,
            'statusChoices' => Reclamation::getStatusChoices(),
            'currentStatus' => $statusFilter,
        ]);
    }
    
    #[Route('/front/dashboard/contact', name: 'app_front_office_contact')]
    public function newFromFront(
        Request $request, 
        EntityManagerInterface $em, 
        EmailService $emailService,
        ContentFilterService $contentFilterService
    ): Response
    {
        $reclamation = new Reclamation();

        // Récupérer l'utilisateur connecté
        $user = $this->getUser();
        
        // Vérifier que l'utilisateur est connecté
        if (!$user) {
            $this->addFlash('error', 'Vous devez être connecté pour soumettre une réclamation.');
            return $this->redirectToRoute('app_login');
        }
        
        // Vérifier que l'utilisateur a un email
        if (!$user->getEmail()) {
            $this->addFlash('error', 'Vous devez avoir un email valide pour soumettre une réclamation.');
            return $this->redirectToRoute('app_profile_edit');
        }
        
        // Associer l'utilisateur à la réclamation
        $reclamation->setUser($user);
        $reclamation->setCreatedAt(new \DateTime());
        
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);
        
        // Variable pour stocker les mots inappropriés détectés
        $detectedBadWords = [];

        if ($form->isSubmitted()) {
            // Vérifier à nouveau que l'utilisateur est bien associé
            if (!$reclamation->getUser()) {
                $reclamation->setUser($user);
            }
            
            // Vérifier si le message contient des mots inappropriés
            // Laisser même les données non-validées par le form être vérifiées
            $message = $request->request->all()['reclamation']['message'] ?? $reclamation->getMessage();
            if (!$message) {
                // Si pas de message trouvé, tentative directe de récupération
                $formData = $request->request->get('reclamation');
                $message = $formData['message'] ?? '';
            }
            
            // Toujours vérifier le message, même si le form n'est pas valid
            $detectedBadWords = $contentFilterService->containsInappropriateContent($message);
            
            // Si des mots inappropriés sont détectés
            if (!empty($detectedBadWords)) {
                // Option 1: Signaler les mots et demander à l'utilisateur de corriger son message
                if (count($detectedBadWords) > 3) {
                    // Si trop de mots inappropriés, renvoyer un message d'erreur
                    $this->addFlash('error', 'Votre message contient trop de termes inappropriés. Veuillez le reformuler.');
                    
                    // Renvoyer le formulaire avec la liste des mots détectés
                    return $this->render('front_office_dashboard/contact.html.twig', [
                        'form' => $form->createView(),
                        'bad_words' => $detectedBadWords
                    ]);
                } else {
                    // Option 2: Filtrer automatiquement le message
                    $filteredMessage = $contentFilterService->filterText($message);
                    $reclamation->setMessage($filteredMessage);
                    $this->addFlash('warning', sprintf(
                        'Certains termes inappropriés (%s) ont été automatiquement filtrés de votre message.',
                        implode(', ', $detectedBadWords)
                    ));
                    
                    // Réappliquer les données filtrées au formulaire
                    $form = $this->createForm(ReclamationType::class, $reclamation);
                    $form->handleRequest($request);
                }
            }
            
            // Dernière vérification de sécurité avant enregistrement
            $finalMessage = $reclamation->getMessage();
            $finalCheck = $contentFilterService->containsInappropriateContent($finalMessage);
            
            if (!empty($finalCheck)) {
                // Si après toutes les vérifications on trouve encore des mots inappropriés
                // on applique un filtrage strict
                $safeMessage = $contentFilterService->filterText($finalMessage);
                $reclamation->setMessage($safeMessage);
            }
            
            // Si le formulaire est valide (après filtrage éventuel)
            if ($form->isValid()) {
                // Enregistrer la réclamation
                $em->persist($reclamation);
                $em->flush();
    
                // Envoyer un email de confirmation
                $emailService->sendReclamationConfirmation($reclamation);
    
                $this->addFlash('success', 'Votre réclamation a été envoyée avec succès. Un email de confirmation vous a été envoyé à ' . $user->getEmail());
    
                return $this->redirectToRoute('app_reclamation_my');
            }
        }

        // Rendre le template avec la liste des mots inappropriés détectés si nécessaire
        return $this->render('front_office_dashboard/contact.html.twig', [
            'form' => $form->createView(),
            'bad_words' => $detectedBadWords,
        ]);
    }

    #[Route('/contact', name: 'contact', methods: ['GET', 'POST'])]
    public function contactAction(Request $request, ContentFilterService $contentFilter): Response
    {
        if ($request->isMethod('POST')) {
            $name = $request->request->get('name');
            $email = $request->request->get('email');
            $subject = $request->request->get('subject');
            $message = $request->request->get('message');

            $errors = [];

            // Validations de base
            if (empty($name)) {
                $errors[] = 'Le nom est requis';
            }
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Email invalide';
            }
            if (empty($subject)) {
                $errors[] = 'Le sujet est requis';
            }
            if (empty($message)) {
                $errors[] = 'Le message est requis';
            }

            // Vérifier le contenu inapproprié
            $badWordsMessage = $contentFilter->containsInappropriateContent($message);
            $badWordsSubject = $contentFilter->containsInappropriateContent($subject);
            
            $badWords = array_unique(array_merge($badWordsMessage, $badWordsSubject));
            
            if (!empty($badWords)) {
                $badWordsStr = implode(', ', $badWords);
                $errors[] = "Votre message contient des mots inappropriés ($badWordsStr). Veuillez les supprimer avant de soumettre.";
            }

            if (empty($errors)) {
                // Traitement du message (enregistrement, envoi d'email, etc.)
                $this->addFlash('success', 'Votre message a été envoyé avec succès!');
                
                return $this->redirectToRoute('contact');
            } else {
                foreach ($errors as $error) {
                    $this->addFlash('danger', $error);
                }
            }
        }

        return $this->render('front_office_dashboard/contact.html.twig');
    }
}
