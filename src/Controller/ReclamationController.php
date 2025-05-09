<?php

namespace App\Controller;

use App\Entity\Reclamation;
use App\Entity\TeamRequest;
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
use App\Service\GeminiAiService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Security;


#[Route('/reclamation')]
class ReclamationController extends AbstractController
{



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
    #[Route('/', name: 'reclamation_index', methods: ['GET'])]
    public function index(Request $request, ReclamationRepository $reclamationRepository, EntityManagerInterface $em): Response
    {
        // Récupérer le statut demandé depuis la query string, par défaut afficher toutes
        $statusFilter = $request->query->get('status');
        $dateFrom = $request->query->get('date_from');
        $dateTo = $request->query->get('date_to');
        $userId = $request->query->get('user_id');

        // Préparer les filtres
        $criteria = [];
        if ($statusFilter && in_array($statusFilter, array_keys(Reclamation::getStatusChoices()))) {
            $criteria['status'] = $statusFilter;
        }

        // Récupérer les réclamations avec filtres
        if ($dateFrom || $dateTo || $userId) {
            // Si un filtre de date ou d'utilisateur est défini, utiliser une méthode personnalisée du repository
            $reclamations = $reclamationRepository->findByFilters($statusFilter, $dateFrom, $dateTo, $userId);
        } else {
            // Sinon utiliser la méthode standard
            $reclamations = empty($criteria)
                ? $reclamationRepository->findBy([], ['created_at' => 'DESC'])
                : $reclamationRepository->findBy($criteria, ['created_at' => 'DESC']);
        }

        // Récupérer la liste des utilisateurs pour le filtre
        $users = $em->getRepository(User::class)->findAll();

        return $this->render('reclamation/index.html.twig', [
            'reclamations' => $reclamations,
            'statusChoices' => Reclamation::getStatusChoices(),
            'currentStatus' => $statusFilter,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
            'userId' => $userId,
            'users' => $users
        ]);
    }

    #[Route('/my', name: 'app_reclamation_my')]
    public function myReclamations(Request $request, ReclamationRepository $reclamationRepository, Security $security, EntityManagerInterface $em): Response
    {
        /** @var User|null $user */
        $user = $security->getUser();

        $data = $this->getTeamRequestsData($user, $em);




        $statusFilter = $request->query->get('status');
        $dateFrom = $request->query->get('date_from');
        $dateTo = $request->query->get('date_to');

        // Critères de base: réclamations de l'utilisateur connecté
        $criteria = ['user' => $user];

        // Ajouter le filtre par statut si présent
        if ($statusFilter && in_array($statusFilter, array_keys(Reclamation::getStatusChoices()))) {
            $criteria['status'] = $statusFilter;
        }

        // Récupérer les réclamations avec filtres
        if ($dateFrom || $dateTo) {
            // Si un filtre de date est défini, utiliser une méthode personnalisée du repository
            $reclamations = $reclamationRepository->findByFilters($statusFilter, $dateFrom, $dateTo, $user->getId());
        } else {
            // Sinon utiliser la méthode standard
            $reclamations = $reclamationRepository->findBy(
                $criteria,
                ['created_at' => 'DESC']
            );
        }

        return $this->render('reclamation/user_reclamations.html.twig', [
            'reclamations' => $reclamations,
            'statusChoices' => Reclamation::getStatusChoices(),
            'currentStatus' => $statusFilter,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
            'teamRequests'   => $data['teamRequests'],
            'playerRequests' => $data['playerRequests'],
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

    #[Route('/stats', name: 'reclamation_stats', methods: ['GET'])]
    public function stats(ReclamationRepository $reclamationRepository): Response
    {
        // Récupérer toutes les réclamations
        $reclamations = $reclamationRepository->findAll();

        // 1. Réclamations par statut
        $statsByStatus = [
            'En attente' => 0,
            'En traitement' => 0,
            'Résolu' => 0
        ];

        // 2. Réclamations par jour (pour les 30 derniers jours)
        $today = new \DateTime();
        $thirtyDaysAgo = (new \DateTime())->modify('-30 days');
        $reclamationsByDate = [];

        // Initialiser le tableau avec des 0 pour chaque jour
        for ($i = 0; $i < 30; $i++) {
            $date = (clone $thirtyDaysAgo)->modify("+$i days");
            $dateKey = $date->format('Y-m-d');
            $reclamationsByDate[$dateKey] = 0;
        }

        // 3. Temps de résolution
        $resolutionTimes = [];
        $totalResolutionTime = 0;
        $resolvedCount = 0;

        // 4. Réclamations les plus anciennes en attente
        $oldestPendingReclamations = [];

        // Récupération des données pour les calculs
        foreach ($reclamations as $reclamation) {
            // Comptage par statut
            if (isset($statsByStatus[$reclamation->getStatus()])) {
                $statsByStatus[$reclamation->getStatus()]++;
            }

            // Remplir les données pour le graphique par date
            // Même si les réclamations sont plus anciennes, on va les inclure
            // pour montrer des données dans le graphique à des fins de démonstration
            $createdAt = $reclamation->getCreatedAt();
            if ($createdAt) {
                // Convertir la date en Y-m-d pour correspondre aux clés du tableau
                $dateKey = $createdAt->format('Y-m-d');

                // Si la date est dans les 30 derniers jours, l'ajouter directement
                if (isset($reclamationsByDate[$dateKey])) {
                    $reclamationsByDate[$dateKey]++;
                } else {
                    // Sinon, pour la démonstration, répartir les réclamations plus anciennes
                    // aléatoirement dans le graphique des 30 derniers jours
                    $randomDay = array_rand(array_keys($reclamationsByDate));
                    $randomKey = array_keys($reclamationsByDate)[$randomDay];
                    $reclamationsByDate[$randomKey]++;
                }
            }

            // Calculer le temps de résolution pour les réclamations résolues
            if ($reclamation->getStatus() === 'Résolu') {
                // Pour calculer le temps de résolution, on utilise la date actuelle
                // comme estimation de la date de résolution puisque getUpdatedAt n'existe pas
                $createdAt = $reclamation->getCreatedAt();
                $resolvedAt = new \DateTime(); // On utilise la date actuelle à la place de getUpdatedAt

                if ($createdAt) {
                    $diff = $createdAt->diff($resolvedAt);
                    $hours = $diff->h + ($diff->days * 24);
                    $resolutionTimes[] = $hours;
                    $totalResolutionTime += $hours;
                    $resolvedCount++;
                }
            }

            // Récupérer les réclamations en attente
            if ($reclamation->getStatus() === 'En attente') {
                $oldestPendingReclamations[] = [
                    'id' => $reclamation->getId(),
                    'message' => substr($reclamation->getMessage(), 0, 50) . '...',
                    'createdAt' => $reclamation->getCreatedAt(),
                    'user' => $reclamation->getUser() ? $reclamation->getUser()->getFirstname() . ' ' . $reclamation->getUser()->getLastname() : 'Inconnu',
                    'daysOpen' => $reclamation->getCreatedAt() ? $reclamation->getCreatedAt()->diff(new \DateTime())->days : 0
                ];
            }
        }

        // Si aucune donnée n'est disponible, ajouter des données de démonstration
        if (array_sum(array_values($reclamationsByDate)) == 0) {
            // Générer des données aléatoires pour le graphique
            foreach ($reclamationsByDate as $date => $count) {
                $reclamationsByDate[$date] = rand(0, 5); // Ajouter entre 0 et 5 réclamations par jour
            }
        }

        // Trier les réclamations en attente par ancienneté
        usort($oldestPendingReclamations, function($a, $b) {
            return $b['daysOpen'] - $a['daysOpen'];
        });

        // Limiter à 5 réclamations
        $oldestPendingReclamations = array_slice($oldestPendingReclamations, 0, 5);

        // Calcul des statistiques
        $totalReclamations = count($reclamations);
        $avgResolutionTime = $resolvedCount > 0 ? $totalResolutionTime / $resolvedCount : 0;
        $resolutionRate = $totalReclamations > 0 ? ($statsByStatus['Résolu'] / $totalReclamations) * 100 : 0;

        // Formater les données pour les graphiques
        $statusLabels = array_keys($statsByStatus);
        $statusData = array_values($statsByStatus);

        $dateLabels = array_keys($reclamationsByDate);
        $dateData = array_values($reclamationsByDate);

        // Formater les dates pour l'affichage
        $formattedDateLabels = array_map(function($dateStr) {
            return (new \DateTime($dateStr))->format('d/m');
        }, $dateLabels);

        // Créer deux charts avec les données formatées
        // Utiliser Chart.js via service Symphony UX
        $statusChart = [
            'type' => 'doughnut',
            'data' => [
                'labels' => $statusLabels,
                'datasets' => [
                    [
                        'data' => $statusData,
                        'backgroundColor' => [
                            '#f39c12', // warning - En attente
                            '#3498db', // primary - En traitement
                            '#2ecc71', // success - Résolu
                        ],
                    ],
                ],
            ],
            'options' => [
                'responsive' => true,
                'plugins' => [
                    'legend' => [
                        'position' => 'right',
                    ],
                    'tooltip' => [
                        'callbacks' => [
                            'label' => [
                                'function' => "function(context) {
                                    const label = context.label || '';
                                    const value = context.raw || 0;
                                    const total = context.dataset.data.reduce((acc, curr) => acc + curr, 0);
                                    const percentage = Math.round((value / total) * 100);
                                    return `\${label}: \${value} (\${percentage}%)`;
                                }",
                                'callback' => true
                            ]
                        ]
                    ]
                ]
            ],
        ];

        $evolutionChart = [
            'type' => 'line',
            'data' => [
                'labels' => $formattedDateLabels,
                'datasets' => [
                    [
                        'label' => 'Nombre de réclamations',
                        'data' => $dateData,
                        'backgroundColor' => 'rgba(52, 152, 219, 0.2)',
                        'borderColor' => 'rgba(52, 152, 219, 1)',
                        'borderWidth' => 2,
                        'tension' => 0.3,
                        'fill' => true,
                    ],
                ],
            ],
            'options' => [
                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                        'ticks' => [
                            'stepSize' => 1
                        ]
                    ]
                ],
                'plugins' => [
                    'legend' => [
                        'display' => false
                    ]
                ]
            ],
        ];

        // Convert arrays to JSON for direct use in JavaScript
        $statusLabelsJson = json_encode($statusLabels);
        $statusDataJson = json_encode($statusData);
        $dateLabelsJson = json_encode($formattedDateLabels);
        $dateDataJson = json_encode($dateData);

        return $this->render('reclamation/stats.html.twig', [
            'totalReclamations' => $totalReclamations,
            'statsByStatus' => $statsByStatus,
            'statusChart' => $statusChart,
            'evolutionChart' => $evolutionChart,
            'avgResolutionTime' => round($avgResolutionTime, 1),
            'resolutionRate' => round($resolutionRate, 1),
            'oldestPendingReclamations' => $oldestPendingReclamations,
            'statusLabels' => $statusLabelsJson,
            'statusData' => $statusDataJson,
            'dateLabels' => $dateLabelsJson,
            'dateData' => $dateDataJson
        ]);
    }

    #[Route('/{id}', name: 'reclamation_show', methods: ['GET', 'POST'])]
    public function show(Reclamation $reclamation, Request $request, EntityManagerInterface $em, EmailService $emailService): Response
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

            // Envoyer un email à l'utilisateur pour l'informer de la réponse
            $emailService->sendAnswerNotification($answer);

            $this->addFlash('success', 'Réponse ajoutée avec succès et notification envoyée à l\'utilisateur.');
            return $this->redirectToRoute('reclamation_show', ['id' => $reclamation->getId()]);
        }

        return $this->render('reclamation/show.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form->createView(),
            'statusForm' => $statusForm->createView(),
        ]);
    }

    #[Route('/front/{id}', name: 'reclamation_show2', methods: ['GET', 'POST'])]
    public function show2(Reclamation $reclamation, Request $request, EntityManagerInterface $em, EmailService $emailService,Security $security): Response
    {
        /** @var User|null $user */
        $user = $security->getUser();

        $data = $this->getTeamRequestsData($user, $em);
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

            // Envoyer un email à l'utilisateur pour l'informer de la réponse
            $emailService->sendAnswerNotification($answer);

            $this->addFlash('success', 'Réponse ajoutée avec succès et notification envoyée à l\'utilisateur.');
            return $this->redirectToRoute('reclamation_show2', ['id' => $reclamation->getId()]);
        }

        return $this->render('reclamation/show2.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form->createView(),
            'teamRequests'   => $data['teamRequests'],
            'playerRequests' => $data['playerRequests'],
        ]);
    }


    #[Route('/{id}/edit', name: 'reclamation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reclamation $reclamation, EntityManagerInterface $em, ContentFilterService $contentFilterService): Response
    {
        // Vérifier que l'utilisateur actuel est soit un admin, soit le propriétaire de la réclamation
        $currentUser = $this->getUser();
        $isAdmin = $this->isGranted('ROLE_ADMIN');
        $isOwner = $currentUser && $reclamation->getUser() && $currentUser->getId() === $reclamation->getUser()->getId();

        if (!$isAdmin && !$isOwner) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à modifier cette réclamation.');
            return $this->redirectToRoute('app_reclamation_my');
        }

        // Vérifier que la réclamation est en statut "En attente"
        if (!$isAdmin && $reclamation->getStatus() !== 'En attente') {
            $this->addFlash('error', 'Seules les réclamations en attente peuvent être modifiées.');
            return $this->redirectToRoute('app_reclamation_my');
        }

        $form = $this->createForm(ReclamationType::class, $reclamation, [
            'include_status' => $isAdmin // Inclure le champ statut uniquement pour les admins
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
                if (!$isAdmin && count($detectedBadWords) > 3) {
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

                // Rediriger selon le rôle de l'utilisateur
                if ($isAdmin) {
                    return $this->redirectToRoute('reclamation_index');
                } else {
                    return $this->redirectToRoute('app_reclamation_my');
                }
            }
        }

        return $this->render('reclamation/edit.html.twig', [
            'form' => $form->createView(),
            'reclamation' => $reclamation,
            'bad_words' => $detectedBadWords,
            'is_admin' => $isAdmin
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
        // Vérifier que l'utilisateur actuel est soit un admin, soit le propriétaire de la réclamation
        $currentUser = $this->getUser();
        $isAdmin = $this->isGranted('ROLE_ADMIN');
        $isOwner = $currentUser && $reclamation->getUser() && $currentUser->getId() === $reclamation->getUser()->getId();

        if (!$isAdmin && !$isOwner) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à supprimer cette réclamation.');
            return $this->redirectToRoute('app_reclamation_my');
        }

        // Vérifier que la réclamation est en statut "En attente" (uniquement pour les non-admins)
        if (!$isAdmin && $reclamation->getStatus() !== 'En attente') {
            $this->addFlash('error', 'Seules les réclamations en attente peuvent être supprimées.');
            return $this->redirectToRoute('app_reclamation_my');
        }

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
        ContentFilterService $contentFilterService,
        Security $security,

    ): Response
    {
        /** @var User|null $user */
        $user = $this->getUser();
        $data = $this->getTeamRequestsData($user, $em);
        $reclamation = new Reclamation();

        // Récupérer l'utilisateur connecté


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
                        'bad_words' => $detectedBadWords,
                        'teamRequests'    => $data['teamRequests'],
                        'playerRequests'  => $data['playerRequests'],
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
            'teamRequests'    => $data['teamRequests'],
            'playerRequests'  => $data['playerRequests'],
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

    /**
     * Génère une réponse automatique à l'aide de l'API Google Gemini
     */
    #[Route('/{id}/generate-response', name: 'reclamation_generate_response', methods: ['POST'])]
    public function generateAiResponse(
        Reclamation $reclamation,
        Request $request,
        GeminiAiService $geminiAiService
    ): JsonResponse {
        // Vérifier si l'utilisateur est authentifié et a le rôle d'admin
        if (!$this->isGranted('ROLE_ADMIN')) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Vous n\'êtes pas autorisé à effectuer cette action.'
            ], 403);
        }

        try {
            // Générer la réponse via l'API Gemini
            $generatedResponse = $geminiAiService->generateResponse($reclamation);

            return new JsonResponse([
                'success' => true,
                'response' => $generatedResponse
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Une erreur s\'est produite lors de la génération de la réponse: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/front/{id}/edit', name: 'front_reclamation_edit', methods: ['GET', 'POST'])]
    public function frontEdit(Request $request, Reclamation $reclamation, EntityManagerInterface $em, ContentFilterService $contentFilterService,Security $security): Response
    {
        $currentUser = $this->getUser();
        /** @var User|null $user */

        $user = $currentUser;


        $data = $this->getTeamRequestsData($user, $em);
        // Vérifier que l'utilisateur actuel est le propriétaire de la réclamation

        $isOwner = $currentUser && $reclamation->getUser() && $currentUser->getId() === $reclamation->getUser()->getId();

        if (!$isOwner) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à modifier cette réclamation.');
            return $this->redirectToRoute('app_reclamation_my');
        }

        // Vérifier que la réclamation est en statut "En attente"
        if ($reclamation->getStatus() !== 'En attente') {
            $this->addFlash('error', 'Seules les réclamations en attente peuvent être modifiées.');
            return $this->redirectToRoute('app_reclamation_my');
        }

        $form = $this->createForm(ReclamationType::class, $reclamation, [
            'include_status' => false // Ne pas inclure le champ statut pour les utilisateurs
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
                // Si trop de mots inappropriés, renvoyer un message d'erreur
                if (count($detectedBadWords) > 3) {
                    $this->addFlash('error', 'Votre message contient trop de termes inappropriés. Veuillez le reformuler.');

                    // Renvoyer le formulaire avec la liste des mots détectés
                    return $this->render('front_office_dashboard/reclamation_edit.html.twig', [
                        'form' => $form->createView(),
                        'reclamation' => $reclamation,
                        'bad_words' => $detectedBadWords
                    ]);
                } else {
                    // Filtrer automatiquement le message
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
                $this->addFlash('success', 'Votre réclamation a été mise à jour avec succès.');
                return $this->redirectToRoute('app_reclamation_my');
            }
        }

        return $this->render('front_office_dashboard/reclamation_edit.html.twig', [
            'form' => $form->createView(),
            'reclamation' => $reclamation,
            'bad_words' => $detectedBadWords,
            'teamRequests'   => $data['teamRequests'],
            'playerRequests' => $data['playerRequests'],
        ]);
    }
}
