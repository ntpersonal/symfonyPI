<?php

namespace App\Controller;

use App\Entity\Matches;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Team;
use App\Form\TeamType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Ranking;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Tournoi;
use App\Entity\User;
use App\Service\ApiFootballService2;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\Security;
final class TeamController extends AbstractController
{
    private $entityManager;
    private $apiFootballService2;
    private $slugger;
    private $logger;
    public function __construct(LoggerInterface $logger,EntityManagerInterface $entityManager,ApiFootballService2 $apiFootballService,SluggerInterface $slugger)
    {
        $this->entityManager = $entityManager;
        $this->apiFootballService2 = $apiFootballService;
        $this->slugger = $slugger;
        $this->logger = $logger;
    }

    #[Route('/admin/dashboard/Teams', name: 'app_admin_dashboard_teams', methods: ['GET', 'POST'])]
    public function tables(Request $request, ManagerRegistry $doctrine, PaginatorInterface $paginator): Response
    {
        $entityManager = $doctrine->getManager();
        $queryBuilder = $entityManager->getRepository(Team::class)->createQueryBuilder('t')
            ->orderBy('t.id', 'DESC');
        
        // Apply filters if they exist
        if ($name = $request->get('name')) {
            $queryBuilder->andWhere('t.nom LIKE :name')
                ->setParameter('name', '%'.$name.'%');
        }
        
        if ($category = $request->get('category')) {
            $queryBuilder->andWhere('t.categorie LIKE :category')
                ->setParameter('category', '%'.$category.'%');
        }
        
        if ($gameMode = $request->get('gameMode')) {
            $queryBuilder->andWhere('t.modeJeu = :gameMode')
                ->setParameter('gameMode', $gameMode);
        }
        
        if ($minPlayers = $request->get('minPlayers')) {
            $queryBuilder->andWhere('t.nombreJoueurs >= :minPlayers')
                ->setParameter('minPlayers', $minPlayers);
        }
        
        if ($maxPlayers = $request->get('maxPlayers')) {
            $queryBuilder->andWhere('t.nombreJoueurs <= :maxPlayers')
                ->setParameter('maxPlayers', $maxPlayers);
        }
        
        // Create pagination
        $pagination = $paginator->paginate(
            $queryBuilder->getQuery(),
            $request->query->getInt('page', 1),
            5 // Number of items per page
        );
        
        $team = new Team();
        $form = $this->createForm(TeamType::class, $team);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $logoFile = $form->get('logoPath')->getData();
                if ($logoFile) {
                    $newFilename = $this->handleFileUpload($logoFile);
                    $team->setLogoPath($newFilename);
                }
                $entityManager->persist($team);
                $entityManager->flush();
                
                $this->addFlash('success', 'Team created successfully!');
                return $this->redirectToRoute('app_admin_dashboard_teams');
            } catch (\Exception $e) {
                $this->addFlash('error', 'An error occurred while creating the team.');
                return $this->redirectToRoute('app_admin_dashboard_teams');
            }
        }
        
        if ($form->isSubmitted() && !$form->isValid()) {
            foreach ($form->getErrors(true) as $error) {
                $this->addFlash('error', $error->getMessage());
            }
        }
        
        return $this->render('admin_dashboard/teams.html.twig',[
            'teams' => $pagination,
            'form' => $form->createView(),
        ]);
    }
    private function handleFileUpload($file)
    {
        // Generate a unique filename
        $newFilename = md5(uniqid()).'.'.$file->guessExtension();
        $uploadDir = 'C:/xampp/htdocs/img/teams/';
        
        // Ensure the upload directory exists
        if (!file_exists($uploadDir)) {
            if (!mkdir($uploadDir, 0777, true)) {
                throw new \RuntimeException('Failed to create upload directory: ' . $uploadDir);
            }
        }

        // Move the file to the upload directory
        $file->move($uploadDir, $newFilename);
        return $newFilename;
    }
    
    #[Route('/admin/teams/{id}/delete', name: 'app_admin_team_delete', methods: ['DELETE'])]
    public function deleteTeam(int $id, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $team = $entityManager->getRepository(Team::class)->find($id);

        if (!$team) {
            return $this->json(['success' => false, 'message' => 'Team not found'], 404);
        }

        try {
            $entityManager->remove($team);
            $entityManager->flush();
            return $this->json(['success' => true]);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'message' => 'Error deleting team'], 500);
        }
    }
    
    #[Route('/admin/teams/{id}/edit', name: 'app_admin_team_edit', methods: ['PUT'])]
    public function editTeam(int $id, Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $team = $entityManager->getRepository(Team::class)->find($id);

        if (!$team) {
            return $this->json(['success' => false, 'message' => 'Team not found'], 404);
        }

        try {
            $data = json_decode($request->getContent(), true);
            
            $team->setNom($data['nom']);
            $team->setCategorie($data['categorie']);
            $team->setModeJeu($data['modeJeu']);
            $team->setNombreJoueurs($data['nombreJoueurs']);
            
            $entityManager->flush();
            
            return $this->json([
                'success' => true,
                'team' => [
                    'id' => $team->getId(),
                    'nom' => $team->getNom(),
                    'categorie' => $team->getCategorie(),
                    'modeJeu' => $team->getModeJeu(),
                    'nombreJoueurs' => $team->getNombreJoueurs()
                ]
            ]);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'message' => 'Error updating team'], 500);
        }
    }
  

   

   

    #[Route('/admin/teams/join-tournament', name: 'app_team_join_tournament', methods: ['POST'])]
    public function joinTournament(Request $request): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);
            $teamId = $data['teamId'];
            $tournamentId = $data['tournamentId'];

            $team = $this->entityManager->getRepository(Team::class)->find($teamId);
            $tournament = $this->entityManager->getRepository(Tournoi::class)->find($tournamentId);

            if (!$team || !$tournament) {
                return new JsonResponse(['success' => false, 'message' => 'Team or tournament not found'], Response::HTTP_NOT_FOUND);
            }

            // Check if team is already in any tournament
            if ($team->getTournoi() !== null) {
                return new JsonResponse(['success' => false, 'message' => 'Team is already in a tournament'], Response::HTTP_BAD_REQUEST);
            }

            // Get all existing rankings for this tournament ordered by position
            $existingRankings = $this->entityManager->getRepository(Ranking::class)
                ->createQueryBuilder('r')
                ->where('r.tournoi = :tournament')
                ->setParameter('tournament', $tournament)
                ->orderBy('r.position', 'ASC')
                ->getQuery()
                ->getResult();

            // Update positions for all existing teams
            $position = 1;
            foreach ($existingRankings as $existingRanking) {
                $existingRanking->setPosition($position);
                $position++;
            }

            // Update the team's tournament
            $team->setTournoi($tournament);

            // Create new ranking entry with the next position
            $ranking = new Ranking();
            $ranking->setTeam($team);
            $ranking->setTournoi($tournament);
            $ranking->setPosition($position); // Set position to the next available number
            $ranking->setPoints(0);
            $ranking->setWins(0);
            $ranking->setDraws(0);
            $ranking->setLosses(0);
            $ranking->setGoalsScored(0);
            $ranking->setGoalsConceded(0);
            $ranking->setGoalDifference(0);

            $this->entityManager->persist($ranking);
            $this->entityManager->flush();

            return new JsonResponse(['success' => true, 'message' => 'Team joined tournament successfully']);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'message' => 'Failed to join tournament'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    #[Route('/front/teams/join-tournament', name: 'team_join_tournament_front', methods: ['POST'])]
    public function joinTournamentFront(
        Request $request,
        EntityManagerInterface $em,
        Security $security
    ): JsonResponse {
        $user = $security->getUser();

        // 1. Sécurité de base
        if (!$user || !$this->isGranted('ROLE_ORGANIZER')) {
            return new JsonResponse(['success' => false, 'message' => 'Unauthorised'], Response::HTTP_FORBIDDEN);
        }

        $data = json_decode($request->getContent(), true);
        $teamId = (int) ($data['teamId']   ?? 0);
        $tourId = (int) ($data['tournamentId'] ?? 0);

        // 2. Vérifications
        /** @var Team|null $team */
        $team = $em->getRepository(Team::class)->find($teamId);
        /** @var Tournoi|null $tournament */
        $tournament = $em->getRepository(Tournoi::class)->find($tourId);

        if (!$team || !$tournament) {
            return new JsonResponse(['success' => false, 'message' => 'Team or tournament not found'], Response::HTTP_NOT_FOUND);
        }
        // Le manager ne peut inscrire **que** son équipe
        if ($user->getTeam()?->getId() !== $team->getId()) {
            return new JsonResponse(['success' => false, 'message' => 'This is not your team'], Response::HTTP_FORBIDDEN);
        }
        if ($team->getTournoi() !== null) {
            return new JsonResponse(['success' => false, 'message' => 'Team already in a tournament'], Response::HTTP_BAD_REQUEST);
        }

        // 3. Mettre la team dans le tournoi + recalculer les positions
        $existingRankings = $em->getRepository(Ranking::class)
            ->createQueryBuilder('r')
            ->where('r.tournoi = :tour')
            ->setParameter('tour', $tournament)
            ->orderBy('r.position', 'ASC')
            ->getQuery()
            ->getResult();

        // Re-numerote proprement
        $position = 1;
        foreach ($existingRankings as $rk) {
            $rk->setPosition($position++);
        }

        // On lie la team au tournoi
        $team->setTournoi($tournament);

        // On crée le ranking pour la nouvelle team
        $ranking = new Ranking();
        $ranking->setTeam($team)
                ->setTournoi($tournament)
                ->setPosition($position)  // dernière position
                ->setPoints(0)
                ->setWins(0)
                ->setDraws(0)
                ->setLosses(0)
                ->setGoalsScored(0)
                ->setGoalsConceded(0)
                ->setGoalDifference(0);

        $em->persist($ranking);
        $em->flush();

        return new JsonResponse(['success' => true]);
    }
    #[Route('/api/teams/league/{leagueId}', name: 'api_teams_by_league', methods: ['GET'])]
    public function getTeamsByLeague(int $leagueId, ApiFootballService2 $api_football): JsonResponse
    {
        try {
            $teams = $api_football->getTeamsByLeague($leagueId);
            return $this->json(['teams' => $teams]);
        } catch (\Exception $e) {
            return $this->json(['error' => $e->getMessage()], 400);
        }
    }
    #[Route('/front/dashboard/assign-team', name: 'api_team_assign', methods: ['POST'])]
    public function assignTeam(
        Security $security,
        Request $request,
        ApiFootballService2 $apiFootball,
        EntityManagerInterface $entityManager,
        LoggerInterface $logger
    ): JsonResponse {
        try {
            $data = json_decode($request->getContent(), true);
            $leagueId = $data['leagueId'] ?? null;
            $leagueName = $data['leagueName'] ?? null;
            $teamId = $data['teamId'] ?? null;
            $teamName = $data['teamName'] ?? null;
            $teamCount = $data['teamCount'] ?? null;
    
            // Validate required parameters
            if (!$leagueId || !$teamId || !$teamName || !$leagueName || !$teamCount) {
                return $this->json([
                    'error' => 'Missing required parameters',
                    'required' => ['leagueId', 'teamId', 'teamName', 'leagueName', 'teamCount']
                ], 400);
            }
    
            /** @var User $user */
            $user = $security->getUser();
            if (!$user) {
                return $this->json(['error' => 'User not authenticated'], 401);
            }
    
            $entityManager->beginTransaction();
    
            try {
                // 1. Tournament handling (find or create)
                $tournament = $entityManager->getRepository(Tournoi::class)->findOneBy([
                    'nom' => $leagueName
                ]);
    
                if (!$tournament) {
                    $tournament = (new Tournoi())
                        ->setNom($leagueName)
                        ->setStartDate(new \DateTime())
                        ->setEndDate((new \DateTime())->modify('+7 days'))
                        ->setNbEquipe($teamCount);
                    $entityManager->persist($tournament);
                }
    
                // 2. Team handling - prevent duplicates
                $team = $this->findOrCreateTeam(
                    $entityManager,
                    $apiFootball,
                    $teamName,
                    $tournament,
                    $logger,
                    $teamId
                );
    
                // 3. Process players (only if team is newly created)
                $players=$entityManager->getRepository(User::class)->findBy(['team' => $team]);
                if (count($players) == 0) {
                    $this->processPlayers($apiFootball, $entityManager, $teamId, $team);
                }
    
                // 4. Process fixtures (with duplicate prevention)
                $this->processFixtures(
                    $apiFootball,
                    $entityManager,
                    $tournament,
                    $teamId,
                    $leagueId,
                    $logger
                );
    
                // 5. Process standings
                $this->processStandings(
                    $apiFootball,
                    $entityManager,
                    $tournament,
                    $leagueId,
                    $logger
                );
    
                // 6. Finalize assignment
                if( $user instanceof User)
                {
                    $user->setTeam($team);
                }
                $entityManager->persist($user);
                $entityManager->flush();
                $entityManager->commit();
    
                return $this->json([
                    'success' => true,
                    'message' => 'Team assigned successfully',
                    'teamId' => $team->getId(),
                    'tournamentId' => $tournament->getId()
                ]);
    
            } catch (\Exception $e) {
                $entityManager->rollback();
                $logger->error('Team assignment failed', ['error' => $e->getMessage()]);
                return $this->json([
                    'error' => 'Assignment failed',
                    'message' => $e->getMessage()
                ], 500);
            }
    
        } catch (\Exception $e) {
            return $this->json([
                'error' => 'Server error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    private function findOrCreateTeam(
        EntityManagerInterface $entityManager,
        ApiFootballService2 $apiFootball,
        string $teamName,
        Tournoi $tournament,
        LoggerInterface $logger,
        int $teamId
    ): Team {
        // Debug current state
        $existingTeams = $entityManager->getRepository(Team::class)
            ->findBy(['tournoi' => $tournament]);
        
        $logger->debug('Existing teams in tournament', [
            'tournament' => $tournament->getId(),
            'teams' => array_map(fn($t) => $t->getNom(), $existingTeams)
        ]);
    
        // Find team
        $team = $entityManager->getRepository(Team::class)->findOneBy([
            'nom' => $teamName,
            'tournoi' => $tournament  // This MUST match the property name
        ]);
    
        if (!$team) {
            $team = new Team();
            $team->setNom($teamName)
                ->setTournoi($tournament)  // This sets the relationship
                ->setCategorie('Football')
                ->setModeJeu('EN_GROUPE');
                $teamData = $apiFootball->getTeamData($teamId);
            if ($teamData) {
                if (isset($teamData['team_badge'])) {
                    $logoPath = $this->downloadAndSaveImage($teamData['team_badge'], 'teams');
                    if ($logoPath) {
                        $team->setLogoPath($logoPath);
                    }
                }
                $team->setNombreJoueurs($teamData['player_count'] ?? 11);
            $entityManager->persist($team);
            $entityManager->flush();  // Ensure team gets ID
        }
    }
    
        return $team;
    }
    /*private function findOrCreateTeam(
        EntityManagerInterface $entityManager,
        ApiFootballService $apiFootball,
        int $teamId,
        string $teamName,
        Tournoi $tournament,
        User $user
    ): Team {
        // First try to find by external ID if you add it
        // Then try by name within tournament
        $team = $entityManager->getRepository(Team::class)->findOneBy([
            'nom' => $teamName,
            'tournoi' => $tournament
        ]);
    
        if (!$team) {
            $team = (new Team())
                ->setNom($teamName)
                ->setCategorie('Football')
                ->setModeJeu('EN_GROUPE')
                ->setTournoi($tournament);
    
            $teamData = $apiFootball->getTeamData($teamId);
            if ($teamData) {
                if (isset($teamData['team_badge'])) {
                    $logoPath = $this->downloadAndSaveImage($teamData['team_badge'], 'teams');
                    if ($logoPath) {
                        $team->setLogoPath($logoPath);
                    }
                }
                $team->setNombreJoueurs($teamData['player_count'] ?? 11);
            }
            $entityManager->persist($team);
        }
    
        // Check for existing manager
        if ($team->getManager() && $team->getManager()->getId() !== $user->getId()) {
            throw new \Exception('This team already has a manager');
        }
    
        $team->setManager($user);
        return $team;
    }*/
    
    private function processFixtures(
        ApiFootballService2 $apiFootball,
        EntityManagerInterface $entityManager,
        Tournoi $tournament,
        int $mainTeamId,
        int $leagueId,
        LoggerInterface $logger
    ): void {
        $fixtures = $apiFootball->getTeamFixtures($mainTeamId, $leagueId);
        
        foreach ($fixtures as $fixtureData) {
            $matchDate = new \DateTime($fixtureData['match_date']);
            $homeTeamId = $fixtureData['match_hometeam_id'];
            $awayTeamId = $fixtureData['match_awayteam_id'];
            $homeTeamName = $fixtureData['match_hometeam_name'];
            $awayTeamName = $fixtureData['match_awayteam_name'];
            
            // Get both teams first
            $teamA = $this->getOrCreateTeam($entityManager, $apiFootball, $homeTeamId, $homeTeamName, $tournament);
            $teamB = $this->getOrCreateTeam($entityManager, $apiFootball, $awayTeamId, $awayTeamName, $tournament);
    
            // Skip if match already exists
            $existingMatch = $entityManager->getRepository(Matches::class)->findOneBy([
                'matchTime' => $matchDate,
                'teamAName' => $teamA->getNom(),
                'teamBName' => $teamB->getNom(),
                'tournoi' => $tournament
            ]);
    
            if (!$existingMatch) {
                $match = new Matches();
                $match->setMatchTime($matchDate)
                    ->setTeamA($teamA)
                    ->setTeamB($teamB)
                    ->setScoreTeamA((int)($fixtureData['match_hometeam_score'] ?? 0))
                    ->setScoreTeamB((int)($fixtureData['match_awayteam_score'] ?? 0))
                    ->setStatus($fixtureData['match_status'])
                    ->setLocationMatch($fixtureData['match_stadium'])
                    ->setTournoi($tournament)
                    ->setTeamAName($teamA->getNom())
                    ->setTeamBName($teamB->getNom());
                $entityManager->persist($match);
            }
        }
    }
    
    private function getOrCreateTeam(
        EntityManagerInterface $entityManager,
        ApiFootballService2 $apiFootball,
        int $teamId,
        string $teamName,
        Tournoi $tournament
    ): Team {
        // Try to find the team by name and tournament
        $team = $entityManager->getRepository(Team::class)->findOneBy([
            'nom' => $teamName,
            'tournoi' => $tournament
        ]);
    
        // Create if not found
        if (!$team) {
            $team = (new Team())
                ->setNom($teamName)
                ->setCategorie('Football')
                ->setModeJeu('EN_GROUPE')
                ->setTournoi($tournament);
    
            $teamData = $apiFootball->getTeamData($teamId);
            if ($teamData) {
                $team->setNombreJoueurs($teamData['player_count'] ?? 11);
    
                if (isset($teamData['team_badge'])) {
                    $logoPath = $this->downloadAndSaveImage($teamData['team_badge'], 'teams');
                    if ($logoPath) {
                        $team->setLogoPath($logoPath);
                    }
                }
            }
    
            $entityManager->persist($team);
            $entityManager->flush(); // Ensure it's saved immediately
        }
    
        return $team;
    }
    
    
    private function processPlayers(
        ApiFootballService2 $apiFootball,
        EntityManagerInterface $entityManager,
        int $teamId,
        Team $team
    ): void {
        $players = $apiFootball->getTeamPlayers($teamId);
        
        foreach ($players as $playerData) {
            $player = new User();
            $player->setFirstname($playerData['player_name'] ?? 'Unknown');
            $player->setLastname($playerData['player_name'] ?? 'Unknown');
            $player->setPosition($playerData['player_type'] ?? 'Unknown');
            
            if (isset($playerData['player_rating'])) {
                $rating = (float)$playerData['player_rating'];
                $scaledRating = (int)round($rating * 10); // Multiply by 10 and round
                $player->setRating($scaledRating);
            }
            
            if (isset($playerData['player_image'])) {
                $playerImagePath = $this->downloadAndSaveImage($playerData['player_image'], 'players');
                if ($playerImagePath) {
                    $player->setProfilepicture($playerImagePath);
                }
            }
            
            $player->setRole('player');
            $player->setCreatedAt(new \DateTime());
            $player->setUpdatedAt(new \DateTime());
            
            // Handle potential invalid birthdates
            try {
                if (!empty($playerData['player_birthdate'])) {
                    $player->setDateofbirth(new \DateTime($playerData['player_birthdate']));
                } else {
                    $player->setDateofbirth(new \DateTime());
                }
            } catch (\Exception $e) {
                $player->setDateofbirth(new \DateTime());
            }
            
            $player->setResetCode(bin2hex(random_bytes(16)));
            
            $expiry = new \DateTime();
            $expiry->add(new \DateInterval('PT1H')); // 1 hour expiry
            $player->setResetCodeExpiry($expiry);
            $player->setTeam($team);
            
            $entityManager->persist($player);
        }
    }
    
    private function processStandings(
        ApiFootballService2 $apiFootball,
        EntityManagerInterface $entityManager,
        Tournoi $tournament,
        int $leagueId,
        LoggerInterface $logger
    ): void {
        $standings = $apiFootball->getLeagueStandings($leagueId);
        
        foreach ($standings as $standingData) {
            $teamName = $standingData['team_name'];
            $teamId = (int)($standingData['team_id'] ?? 0);

            // Find team by name and tournament
            $standingTeam = $entityManager->getRepository(Team::class)->findOneBy([
                'nom' => $teamName,
                'tournoi' => $tournament
            ]);
            
            // If team not found, create it
            if (!$standingTeam) {
                $standingTeam = $this->getOrCreateTeam(
                    $entityManager, 
                    $apiFootball, 
                    $teamId, 
                    $teamName, 
                    $tournament
                );
            }
            // Check if ranking already exists for this team in this tournament
            $existingRanking = $entityManager->getRepository(Ranking::class)->findOneBy([
                'team' => $standingTeam,
                'tournoi' => $tournament
            ]);
            
            // Update existing ranking or create new one
            $teamStanding = $existingRanking ?: new Ranking();
            
            $teamStanding->setTeam($standingTeam);
            $teamStanding->setPosition((int)($standingData['overall_league_position'] ?? 0));
            $teamStanding->setWins((int)($standingData['overall_league_W'] ?? 0));
            $teamStanding->setDraws((int)($standingData['overall_league_D'] ?? 0));
            $teamStanding->setLosses((int)($standingData['overall_league_L'] ?? 0));
            $teamStanding->setPoints((int)($standingData['overall_league_PTS'] ?? 0));
            
            $goalsScored = (int)($standingData['overall_league_GF'] ?? 0);
            $goalsConceded = (int)($standingData['overall_league_GA'] ?? 0);
            
            $teamStanding->setGoalsScored($goalsScored);
            $teamStanding->setGoalsConceded($goalsConceded);
            $teamStanding->setGoalDifference($goalsScored - $goalsConceded);
            $teamStanding->setTournoi($tournament);
            
            $entityManager->persist($teamStanding);
        }
    }
    private function downloadAndSaveImage(string $imageUrl, string $subdirectory): ?string
    {
        // Validate URL
        if (empty($imageUrl) || !filter_var($imageUrl, FILTER_VALIDATE_URL)) {
            error_log("Invalid image URL: {$imageUrl}");
            return null;
        }

        // Base directory (matches your ImageController)
        $baseDirectory = 'C:/xampp/htdocs/img/';
        $targetDirectory = $baseDirectory . $subdirectory . '/';

        // Create directory if needed
        if (!file_exists($targetDirectory)) {
            if (!mkdir($targetDirectory, 0777, true) && !is_dir($targetDirectory)) {
                error_log("Failed to create directory: {$targetDirectory}");
                return null;
            }
        }

        // Generate safe filename
        $pathInfo = pathinfo(parse_url($imageUrl, PHP_URL_PATH));
        $extension = $pathInfo['extension'] ?? 'jpg';
        $filename = ($pathInfo['filename'] ?? md5($imageUrl)) . '.' . $extension;
        $safeFilename = preg_replace('/[^a-zA-Z0-9\-\._]/', '', $filename);
        $uniqueFilename = uniqid() . '_' . $safeFilename;
        
        $fullPath = $targetDirectory . $uniqueFilename;

        // Download with error handling
        try {
            $context = stream_context_create([
                'ssl' => [
                    'verify_peer' => true,
                    'verify_peer_name' => true,
                    'cafile' => 'C:/xampp/php/extras/ssl/cacert.pem'
                ],
                'http' => [
                    'timeout' => 10,
                    'ignore_errors' => true
                ]
            ]);

            $imageData = file_get_contents($imageUrl, false, $context);
            if ($imageData === false) {
                throw new \RuntimeException("Download failed");
            }

            if (file_put_contents($fullPath, $imageData) === false) {
                throw new \RuntimeException("File write failed");
            }

            // Return path relative to base directory for use in URLs
            return trim($subdirectory . '/' . $uniqueFilename, '/');

        } catch (\Exception $e) {
            error_log("Image download failed: {$e->getMessage()} (URL: {$imageUrl})");
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
            return null;
        }
    }

            // Create a helper method to get player count for a team
        private function getTeamPlayerCount(ApiFootballService2 $apiFootball, int $teamId): int
        {
            try {
                $teamData = $apiFootball->getTeamData($teamId);
                return $teamData['player_count'] ?? 11; // Default to 11 if not available
            } catch (\Exception $e) {
                return 11; // Fallback value
            }
        }
    
    #[Route('/api/teams/create', name: 'api_teams_create', methods: ['POST'])]
    public function createTeamApi(Request $request): JsonResponse
    {
        try {
            $team = new Team();
            $team->setNom($request->request->get('name'));
            $team->setCategorie($request->request->get('category'));
            $team->setNombreJoueurs((int)$request->request->get('nbPlayers'));
            $team->setModeJeu($request->request->get('modeJeu'));
            
            /** @var UploadedFile $logoFile */
            $logoFile = $request->files->get('logo');
            if ($logoFile) {
                $newFilename = $this->handleFileUpload($logoFile);
                $team->setLogoPath($newFilename);
            }

            $this->entityManager->persist($team);
            $this->entityManager->flush();
            
            // Assign to current user if needed
            $user = $this->getUser();
            if ($user) {
               // $user->setTeam($team);
                $this->entityManager->persist($user);
                $this->entityManager->flush();
            }
            
            return $this->json([
                'success' => true,
                'teamId' => $team->getId()
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    


}
