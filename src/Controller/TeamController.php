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
use App\Service\ApiFootballService;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\Security;
final class TeamController extends AbstractController
{
    private $entityManager;
    private $apiFootballService;
    private $slugger;
    private $logger;
    public function __construct(LoggerInterface $logger,EntityManagerInterface $entityManager,ApiFootballService $apiFootballService,SluggerInterface $slugger)
    {
        $this->entityManager = $entityManager;
        $this->apiFootballService = $apiFootballService;
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
        $uploadDir = 'C:/xampp4/htdocs/img/teams/';
        
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
    #[Route('/api/teams/league/{leagueId}', name: 'api_teams_by_league', methods: ['GET'])]
    public function getTeamsByLeague(int $leagueId, ApiFootballService $api_football): JsonResponse
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
        ApiFootballService $apiFootball,
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
            $logger->info('Attempting to assign team', [
                'leagueId' => $leagueId,
                'teamId' => $teamId,
                'teamName' => $teamName
            ]);
    
            if (!$leagueId || !$teamId || !$teamName || !$leagueName || !$teamCount) {
                return $this->json([
                    'error' => 'Missing required parameters',
                    'received' => $data, // For debugging
                    'required' => ['leagueId', 'teamId', 'teamName', 'leagueName', 'teamCount']
                ], 400);
            }
            $logger->info('Received data', [
                'data' => $data,
                'types' => [
                    'leagueId' => gettype($leagueId),
                    'teamId' => gettype($teamId),
                    'teamName' => gettype($teamName),
                    'leagueName' => gettype($leagueName),
                    'teamCount' => gettype($teamCount)
                ]
            ]);
            /** @var User $user */
            $user = $security->getUser();
            if (!$user) {
                return $this->json(['error' => 'User not authenticated'], 401);
            }
    
            // Transaction for data integrity
            $entityManager->beginTransaction();
    
            try {
                // Tournament handling
                $tournament = $entityManager->getRepository(Tournoi::class)->findOneBy(['nom' => $leagueName]) 
                    ?? (new Tournoi())
                        ->setNom($leagueName)
                        ->setStartDate(new \DateTime())
                        ->setEndDate((new \DateTime())->modify('+7 days'))
                        ->setNbEquipe($teamCount);
    
                $entityManager->persist($tournament);
    
                // Team handling
                $team = $entityManager->getRepository(Team::class)->findOneBy(['nom' => $teamName])
                    ?? (new Team())
                        ->setNom($teamName)
                        ->setCategorie('Football')
                        ->setModeJeu('EN_GROUPE')
                        ->setTournoi($tournament);
    
                if (!$team->getId()) {
                    $teamData = $apiFootball->getTeamData($teamId);
                    if ($teamData && isset($teamData['team_badge'])) {
                            $logoPath = $this->downloadAndSaveImage($teamData['team_badge'], 'teams');
                            if ($logoPath) {
                                $team->setLogoPath($logoPath); // Will store like "teams/abc123.jpg"
                            }
                        }
                    // Set player count from API
                    $playerCount = $teamData['player_count'] ?? 11;
                    $team->setNombreJoueurs($playerCount);
                    $entityManager->persist($team);
                }
                //3 fetch players
                // 3. Fetch and store players
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
                            $player->setProfilepicture($playerImagePath); // Will store like "players/def456.jpg"
                        }
                    }
                    $player->setPosition($playerData['player_type'] ?? 'Unknown');
                    $player->setRole('player');
                    $player->setCreatedAt(new \DateTime());
                    $player->setUpdatedAt(new \DateTime());
                    $player->setDateofbirth(new \DateTime($playerData['player_birthdate'] ?? ''));
                    $player->setResetCode(bin2hex(random_bytes(16)));
                    $expiry = new \DateTime();
                    $expiry->add(new \DateInterval('PT1H')); // 1 hour expiry
                    $player->setResetCodeExpiry($expiry);
                    $player->setTeam($team);
                    $entityManager->persist($player);
                }
            
                                //4 fetch matches of the team selected
                $teamFixtures = $apiFootball->getTeamFixtures($teamId, $leagueId);
                    foreach ($teamFixtures as $fixtureData) {
                        if ($fixtureData['match_hometeam_id'] == $teamId || $fixtureData['match_awayteam_id'] == $teamId) {
                        $match = new Matches();
                        $match->setMatchTime(new \DateTime($fixtureData['match_date']));
                        
                        // Handle home team (check if exists or create new)
                        $homeTeamName = $fixtureData['match_hometeam_name'];
                        $homeTeamId = $fixtureData['match_hometeam_id'];
                        $homeTeam = $entityManager->getRepository(Team::class)->findOneBy(['nom' => $homeTeamName]);
                        if (!$homeTeam || $homeTeamId != $teamId) {
                            $homeTeamData = $apiFootball->getTeamData($fixtureData['match_hometeam_id']);
                            $homeTeam = (new Team())
                                ->setNom($homeTeamName)
                                ->setCategorie('Football')
                                ->setModeJeu('EN_GROUPE')
                                ->setNombreJoueurs($this->getTeamPlayerCount($apiFootball, $fixtureData['match_hometeam_id']))
                                ->setTournoi($tournament);
                        
                            if ($homeTeamData && isset($homeTeamData['team_badge'])) {
                                $logoPath = $this->downloadAndSaveImage($homeTeamData['team_badge'], 'teams');
                                if ($logoPath) {
                                    $homeTeam->setLogoPath($logoPath); // Will store like "teams/abc123.jpg"
                                }
                            }
                        
                            $entityManager->persist($homeTeam);
                        }
                        
                        // Handle away team (check if exists or create new)
                        $awayTeamName = $fixtureData['match_awayteam_name'];
                        $awayTeamId = $fixtureData['match_awayteam_id'];
                        $awayTeam = $entityManager->getRepository(Team::class)->findOneBy(['nom' => $awayTeamName]);
                        if (!$awayTeam || $awayTeamId != $teamId) {
                            $awayTeam = (new Team())
                                ->setNom($awayTeamName)
                                ->setCategorie('Football')
                                ->setModeJeu('EN_GROUPE')
                                ->setNombreJoueurs($this->getTeamPlayerCount($apiFootball, $fixtureData['match_awayteam_id']))
                                ->setTournoi($tournament);
                            
                            // Get team data for the away team
                            $awayTeamData = $apiFootball->getTeamData($fixtureData['match_awayteam_id']);
                            if ($awayTeamData && isset($awayTeamData['team_badge'])) {
                                $logoPath = $this->downloadAndSaveImage($awayTeamData['team_badge'], 'teams');
                                if ($logoPath) {
                                    $awayTeam->setLogoPath($logoPath); // Will store like "teams/abc123.jpg"
                                }
                            }
                            
                            $entityManager->persist($awayTeam);
                        }
                        
                        $match->setTeamA($homeTeam);
                        $match->setTeamB($awayTeam);
                        $homeScore = isset($fixtureData['match_hometeam_score']) 
                            ? (int)$fixtureData['match_hometeam_score'] 
                            : 0;
                        $match->setScoreTeamA($homeScore);

                        // For away team score
                        $awayScore = isset($fixtureData['match_awayteam_score']) 
                            ? (int)$fixtureData['match_awayteam_score'] 
                            : 0;
                        $match->setScoreTeamB($awayScore);
                        $match->setStatus($fixtureData['match_status']);
                        $match->setLocationMatch($fixtureData['match_stadium']);
                        $match->setTournoi($tournament);
                        $entityManager->persist($match);
                    }
                }

                //5 fetch matches of the other teams in the tournament
                $allFixtures = $apiFootball->getTeamFixtures(0, $leagueId); // 0 to get all fixtures
                    foreach ($allFixtures as $fixtureData) {
                        if ($fixtureData['match_hometeam_id'] != $teamId && $fixtureData['match_awayteam_id'] != $teamId) {
                            $match = new Matches();
                            $match->setMatchTime(new \DateTime($fixtureData['match_date']));
                            
                            // Handle home team (check if exists or create new)
                            $homeTeamName = $fixtureData['match_hometeam_name'];
                            $homeTeam = $entityManager->getRepository(Team::class)->findOneBy(['nom' => $homeTeamName]);
                            if ($homeTeam == null) {
                                $homeTeamData = $apiFootball->getTeamData($fixtureData['match_hometeam_id']);
                                $homeTeam = (new Team())
                                    ->setNom($homeTeamName)
                                    ->setCategorie('Football')
                                    ->setModeJeu('EN_GROUPE')
                                    ->setNombreJoueurs($this->getTeamPlayerCount($apiFootball, $fixtureData['match_hometeam_id']))
                                    ->setTournoi($tournament);
                            
                                if ($homeTeamData && isset($homeTeamData['team_badge'])) {
                                    $logoPath = $this->downloadAndSaveImage($homeTeamData['team_badge'], 'teams');
                                    if ($logoPath) {
                                        $homeTeam->setLogoPath($logoPath); // Will store like "teams/abc123.jpg"
                                    }
                                }
                            
                                $entityManager->persist($homeTeam);
                            }
                            
                            // Handle away team (check if exists or create new)
                            $awayTeamName = $fixtureData['match_awayteam_name'];
                            $awayTeam = $entityManager->getRepository(Team::class)->findOneBy(['nom' => $awayTeamName]);
                            if ($awayTeam == null) {
                                $awayTeam = (new Team())
                                    ->setNom($awayTeamName)
                                    ->setCategorie('Football')
                                    ->setModeJeu('EN_GROUPE')
                                    ->setNombreJoueurs($this->getTeamPlayerCount($apiFootball, $fixtureData['match_awayteam_id']))
                                    ->setTournoi($tournament);
                                
                                // Get team data for the away team
                                $awayTeamData = $apiFootball->getTeamData($fixtureData['match_awayteam_id']);
                                if ($awayTeamData && isset($awayTeamData['team_badge'])) {
                                    $logoPath = $this->downloadAndSaveImage($awayTeamData['team_badge'], 'teams');
                                    if ($logoPath) {
                                        $awayTeam->setLogoPath($logoPath); // Will store like "teams/abc123.jpg"
                                    }
                                }
                                
                                $entityManager->persist($awayTeam);
                            }
                        
                            $match->setTeamA($homeTeam);
                            $match->setTeamB($awayTeam);
                            $homeScore = isset($fixtureData['match_hometeam_score']) 
                            ? (int)$fixtureData['match_hometeam_score'] 
                            : 0;
                        $match->setScoreTeamA($homeScore);

                        // For away team score
                        $awayScore = isset($fixtureData['match_awayteam_score']) 
                            ? (int)$fixtureData['match_awayteam_score'] 
                            : 0;
                        $match->setScoreTeamB($awayScore);
                            $match->setStatus($fixtureData['match_status']);
                            
                            $match->setLocationMatch($fixtureData['match_stadium']);
                            $match->setTournoi($tournament);
                            $entityManager->persist($match);
                    }
                }

                //6 fetch standings of the tournament
                $standings = $apiFootball->getLeagueStandings($leagueId);
                foreach ($standings as $standingData) {
                    $teamStanding = new Ranking();
                    
                    // Find or create team for the standing
                    $teamName = $standingData['team_name'];
                    $standingTeam = $entityManager->getRepository(Team::class)->findOneBy(['nom' => $teamName]);
                    if (!$standingTeam) {
                        $standingTeam = (new Team())
                            ->setNom($teamName)
                            ->setCategorie('Football')
                            ->setModeJeu('EN_GROUPE')
                            ->setNombreJoueurs($this->getTeamPlayerCount($apiFootball, $standingData['team_id']))
                            ->setTournoi($tournament);
                        $entityManager->persist($standingTeam);
                    }
                    
                    $teamStanding->setTeam($standingTeam);
                    $teamStanding->setPosition((int)($standingData['overall_league_position'] ?? 0));
                    $teamStanding->setWins((int)($standingData['overall_league_W'] ?? 0));
                    $teamStanding->setDraws((int)($standingData['overall_league_D'] ?? 0));
                    $teamStanding->setLosses((int)($standingData['overall_league_L'] ?? 0));
                    $teamStanding->setPoints((int)($standingData['overall_league_PTS'] ?? 0));
                    $goalsScored = isset($standingData['overall_league_GF']) 
                    ? (int)$standingData['overall_league_GF'] 
                    : 0;
                    $GoalsConceded = isset($standingData['overall_league_GA']) 
                    ? (int)$standingData['overall_league_GA'] 
                    : 0;
                    $teamStanding->setGoalsScored($goalsScored);
                    $teamStanding->setGoalsConceded($GoalsConceded);
                    $teamStanding->setGoalDifference($goalsScored - $GoalsConceded);
                    $teamStanding->setTournoi($tournament);
                    $entityManager->persist($teamStanding);
                }
                //7 Assign team
                $user->setTeam($team);
                $entityManager->persist($user);
                $entityManager->flush();
                $entityManager->commit();
    
                $logger->info('Team assigned successfully', [
                    'userId' => $user->getId(),
                    'teamId' => $team->getId()
                ]);
    
                return $this->json([
                    'success' => true,
                    'message' => 'Team assigned successfully',
                    'teamId' => $team->getId(),
                    'teamName' => $team->getNom(),
                    'tournamentId' => $tournament->getId()
                ]);
    
            } catch (\Exception $e) {
                $entityManager->rollback();
                $logger->error('Team assignment failed', ['error' => $e->getMessage()]);
                throw $e;
            }
    
        } catch (\Exception $e) {
            return $this->json([
                'error' => 'Assignment failed',
                'message' => $e->getMessage(),
                'trace' => $this->getParameter('kernel.environment') === 'dev' ? $e->getTraceAsString() : null
            ], 500);
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
        $baseDirectory = 'C:/xampp4/htdocs/img/';
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
                    'cafile' => 'C:/xampp4/php/extras/ssl/cacert.pem'
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
        private function getTeamPlayerCount(ApiFootballService $apiFootball, int $teamId): int
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
