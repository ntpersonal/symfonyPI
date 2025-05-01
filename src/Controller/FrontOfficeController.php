<?php

namespace App\Controller;

use App\Repository\MatchesRepository;
use App\Repository\TournoiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Team;
use Doctrine\ORM\EntityManagerInterface;
use App\Controller\TeamManagerCheckerController;
use App\Service\ApiFootballService;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Security\Core\Security;
use App\Entity\Ranking;
use App\Entity\TeamRequest;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
final class FrontOfficeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/front/dashboard', name: 'app_front_office')]
    public function index(Security $security, EntityManagerInterface $em): Response
    {
        /** @var User|null $user */
        $user = $security->getUser();

        $data = $this->getTeamRequestsData($user, $em);

        // your sample player payload
        $player = [
            'id'          => 1,
            'name'        => 'John Doe',
            'role'        => 'FORWARD',
            'description' => 'There are so many sports available in the world nowadays…'
        ];

        return $this->render('front_office_dashboard/index.html.twig', [
            'controller_name' => 'FrontOfficeController',
            'player'          => $player,
            'teamRequests'    => $data['teamRequests'],
            'playerRequests'  => $data['playerRequests'],
        ]);
    }

    #[Route('/front/dashboard/home1', name: 'app_home1')]
    public function home1(Security $security, EntityManagerInterface $em): Response
    {
        /** @var User|null $user */
        $user = $security->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $data = $this->getTeamRequestsData($user, $em);

        // note: same variable names as in index()
        return $this->render('front_office_dashboard/index.html.twig', [
            'teamRequests'   => $data['teamRequests'],
            'playerRequests' => $data['playerRequests'],
        ]);
    }
    
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
        #[Route('/front/dashboard/team', name: 'app_team', methods: ['GET','POST'])]
    public function team(
        Request $request,
        Security $security,
        TeamManagerCheckerController $teamManagerChecker,
        ApiFootballService $api_football,
        EntityManagerInterface $entityManager
    ): Response {
        /** @var User $user */
        $user = $security->getUser();
        if (!$user) {
            return $this->json(['error' => 'User not authenticated'], 401);
        }

        $data = $this->getTeamRequestsData($user, $entityManager);

        $team = $user->getTeam();
        if ($request->isMethod('GET')) {
        $players = $this->entityManager->getRepository(User::class)->findBy([
            'team' => $team,
            'role' => 'player'
        ], ['position' => 'ASC']);    
        $teams = $this->entityManager->getRepository(Team::class)->findAll();
        $sslCertPath = 'C:/xampp4/php/extras/ssl/cacert.pem';
    if (!file_exists($sslCertPath)) {
        $this->addFlash('error', 'SSL certificate file not found at: '.$sslCertPath);
        // You could either:
        // 1. Continue without API calls
        // 2. Redirect to an error page
        // 3. Throw an exception
        
        // For this example, we'll continue but without API data
        $topLeagues = [];
    } else {
        // Only make API calls if certificate exists
        $season = 2024;
        try {
            $topLeagues = $api_football->getTop5Leagues($season);
        } catch (\Exception $e) {
            $this->addFlash('warning', 'Could not fetch league data: '.$e->getMessage());
            $topLeagues = [];
        }
    }

                
                // Filter to only include teams with managers
        $teamsWithManagers = array_filter($teams, function($team) use ($teamManagerChecker) {
            return $teamManagerChecker->hasTeamManager($team);
        });
        $teamsWithStatus = array_map(function($team) use ($teamManagerChecker) {
            return [
                'team' => $team,
                'hasManager' => $teamManagerChecker->hasTeamManager($team)
            ];
        }, $teamsWithManagers);
        }
        if ($request->isMethod('POST')) {
            try {
                // Get all data including files
                dump("Request data:", $request->request->all());
                dump("Files data:", $request->files->all());
                
                // Get regular form fields - use the exact names from your form
                $data = [
                    'name' => $request->request->get('team-name'), // match form field name
                    'category' => $request->request->get('team-category'),
                    'players' => $request->request->get('team-players'),
                    'mode' => $request->request->get('team-mode'),
                    'logo' => $request->request->get('team-logo')
                ];
                
                // Get uploaded file - use exact form field name
                $logoFile = $request->files->get('team-logo'); // match file input name
                
                // Debug the received data
                dump("Processed data:", $data);
                dump("Logo file:", $logoFile);
                
                // Validate required fields
                if (empty($data['name']) || empty($data['category']) || 
                    empty($data['players']) || empty($data['mode'])) {
                    throw new \Exception('All fields are required');
                }
        
                // Validate number of players
                if (!is_numeric($data['players']) || $data['players'] < 1 || $data['players'] > 30) {
                    throw new \Exception('Number of players must be between 1 and 30');
                }
        
                // Create and persist team
                $team = new Team();
                $team->setNom($data['name']);
                $team->setCategorie($data['category']);
                if($data['mode'] == 'Group'){
                    $team->setModeJeu('EN_GROUPE');
                }else{
                    $team->setModeJeu('PAR_2');
                }
                $team->setNombreJoueurs((int)$data['players']);
        
                // Handle file upload
                if ($logoFile) {
                    $newFilename = $this->handleFileUpload($logoFile);
                    $team->setLogoPath($newFilename);
                }
        
                $entityManager->persist($team);
                $user->setTeam($team);
                $entityManager->persist($user);
                $entityManager->flush();
        
                if ($request->isXmlHttpRequest()) {
                    return new JsonResponse([
                        'success' => true,
                        'redirectUrl' => $this->generateUrl('app_team')
                    ]);
                }
        
                // For regular form submissions
                return $this->redirectToRoute('app_team');
        
            } catch (\Exception $e) {
                // Handle AJAX errors
                if ($request->isXmlHttpRequest()) {
                    return new JsonResponse([
                        'success' => false,
                        'error' => 'Error: ' . $e->getMessage()
                    ], 400);
                }
        
                // For regular form submissions
                $this->addFlash('error', 'Error: ' . $e->getMessage());
                return $this->redirectToRoute('app_team');
            }
        }

        return $this->render('front_office_dashboard/team.html.twig', [
            'teamsWithStatus' => $teamsWithStatus,
            'topLeagues' => $topLeagues,
            'players' => $players,
            'currentTeam' => $team,
            'teamRequests'   => $data['teamRequests'],
            'playerRequests' => $data['playerRequests'],
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
    #[Route('/front/dashboard/team/{id}', name: 'app_team_details')]
    public function team_details(int $id): Response
    {
        return $this->render('front_office_dashboard/team-details.html.twig', [
            'team' => null // TODO: Fetch team data from database
        ]);
    }
    #[Route('/front/dashboard/history', name: 'app_history')]
    public function history(): Response
    {
        return $this->render('front_office_dashboard/history.html.twig');
    }
    #[Route('/front/dashboard/event', name: 'app_event')]
    public function event(): Response
    {
        return $this->render('front_office_dashboard/event.html.twig');
    }
    #[Route('/front/dashboard/event/{id}', name: 'app_event_details')]
    public function event_details(int $id): Response
    {
        return $this->render('front_office_dashboard/event-details.html.twig', [
            'event' => null // TODO: Fetch team data from database
        ]);
    }
    #[Route('/front/dashboard/error', name: 'app_error')]
    public function error(): Response
    {
        return $this->render('front_office_dashboard/error.html.twig');
    }
    #[Route('/front/dashboard/match_schedule', name: 'app_match_schedule')]
    public function match_schedule(): Response
    {
        return $this->render('front_office_dashboard/match-schedule.html.twig');
    }
    #[Route('/front/dashboard/match_result', name: 'app_match_result')]
    public function match_result(): Response
    {
        return $this->render('front_office_dashboard/match-result.html.twig');
    }
    #[Route('/front/dashboard/gallery', name: 'app_gallery')]
    public function gallery(): Response
    {
        return $this->render('front_office_dashboard/gallery.html.twig');
    }
    #[Route('/front/dashboard/sponsored', name: 'app_sponsored')]
    public function sponsored(): Response
    {
        return $this->render('front_office_dashboard/sponsored.html.twig');
    }
    #[Route('/front/dashboard/awards', name: 'app_awards')]
    public function awards(): Response
    {
        return $this->render('front_office_dashboard/awards.html.twig');
    }
    #[Route('/front/dashboard/home2', name: 'app_home2')]
    public function home2(): Response
    {
        return $this->render('front_office_dashboard/index-two.html.twig');
    }

    #[Route('/front/dashboard/home3', name: 'app_home3')]
    public function home3(): Response
    {
        return $this->render('front_office_dashboard/index-three.html.twig');
    }

    #[Route('/front/dashboard/checkout', name: 'app_checkout')]
    public function checkout(): Response
    {
        return $this->render('front_office_dashboard/checkout.html.twig');
    }

    #[Route('/front/dashboard/cart', name: 'app_cart')]
    public function cart(): Response
    {
        return $this->render('front_office_dashboard/cart.html.twig');
    }


    #[Route('/front/dashboard/score', name: 'app_score')]
    public function score(EntityManagerInterface $entityManager, Security $security): Response
    {
        /** @var User $user */
        $user = $security->getUser();
        $team = null;
        $leagueId = null;
        $rankings = [];

        $data = $this->getTeamRequestsData($user, $entityManager);

        if ($user instanceof User) {
            $team = $user->getTeam();
            
            // If user has a team, get the tournament/league ID
            if ($team && $team->getTournoi()) {
                $leagueId = $team->getTournoi()->getId();
                
                // Get rankings only for this specific league/tournament
                $rankings = $entityManager->getRepository(Ranking::class)
                    ->createQueryBuilder('r')
                    ->join('r.team', 't')
                    ->join('r.tournoi', 'tournament')
                    ->where('tournament.id = :leagueId')
                    ->setParameter('leagueId', $leagueId)
                    ->orderBy('r.position', 'ASC')
                    ->getQuery()
                    ->getResult();
            }
        }
    
        
    
        return $this->render('front_office_dashboard/score.html.twig', [
            'rankings' => $rankings,
            'userTeam' => $team,
            'currentLeagueId' => $leagueId,
            'teamRequests'   => $data['teamRequests'],
            'playerRequests' => $data['playerRequests'],
        ]);
    }

    #[Route('/front/dashboard/player/{id}', name: 'app_player_details')]
    public function playerDetails(int $id,Security $security,EntityManager $em): Response
    {
        /** @var User|null $user */
        $user = $security->getUser();

        $data = $this->getTeamRequestsData($user, $em);

        $player = $this->entityManager->getRepository(User::class)->find($id);
        return $this->render('front_office_dashboard/player-details.html.twig', [
            'player' => $player, // TODO: Fetch player data from database
            'teamRequests'   => $data['teamRequests'],
            'playerRequests' => $data['playerRequests'],
        ]);
    }

    #[Route('/front/dashboard/category/{id}', name: 'app_category_details')]
    public function categoryDetails(int $id): Response
    {
        return $this->render('front_office_dashboard/category-details.html.twig', [
            'category' => null // TODO: Fetch category data from database
        ]);
    }
    #[Route('/front/dashboard/blog', name: 'app_blog_front')]
    public function blog(): Response
    {
        return $this->render('front_office_dashboard/blog.html.twig');
    }
    #[Route('/front/dashboard/blog/{id}', name: 'app_blog_front_details')]
    public function blogDetails(int $id): Response
    {
        return $this->render('front_office_dashboard/blog-details.html.twig', [
            'blog' => null // TODO: Fetch blog data from database
        ]);
    }
   
    #[Route('/front/dashboard/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('front_office_dashboard/about.html.twig');
    }

    #[Route('/front/dashboard/shop', name: 'app_shop')]
    public function shop(): Response
    {
        return $this->render('front_office_dashboard/shop.html.twig', [
            'products' => [], // TODO: Fetch products from database
            'currentPage' => 1,
            'totalPages' => 1
        ]);
    }

    #[Route('/front/dashboard/product/{id}', name: 'app_product_details')]
    public function productDetails(int $id): Response
    {
        return $this->render('front_office_dashboard/product-details.html.twig', [
            'product' => null // TODO: Fetch product data from database
        ]);
    }
    #[Route('/front/dashboard/thank_you', name: 'app_thank_you')]
    public function thank_you(): Response
    {
        return $this->render('front_office_dashboard/thank-you.html.twig');
    }
    #[Route('/front/dashboard/account', name: 'app_account')]
    public function account(): Response
    {
        return $this->render('front_office_dashboard/account.html.twig');
    }
    


    #[Route('/front/dashboard/faq', name: 'app_faq')]
    public function faq(): Response
    {
        return $this->render('front_office_dashboard/faq.html.twig');
    }
    #[Route('/front/dashboard/matches', name: 'app_front_matches')]
public function matches(MatchesRepository $matchesRepo): Response
{
    $matches = $matchesRepo->findBy([], ['matchTime' => 'DESC']);

    return $this->render('front_office_dashboard/matches.html.twig', [
        'matches' => $matches,
    ]);
}

    #[Route('/front/dashboard/tournois', name: 'app_front_tournois')]
    public function tournois(TournoiRepository $tournoiRepo): Response
    {
        // sort by the actual field name "start_date"
        $tournois = $tournoiRepo->findBy([], ['start_date' => 'DESC']);

        return $this->render('front_office_dashboard/tournois.html.twig', [
            'tournois' => $tournois,
        ]);
    }
    #[Route('/front/dashboard/tournois/{id}', name: 'app_front_tournoi_show', methods: ['GET'])]
    public function showTournoi(int $id, TournoiRepository $tournoiRepo): Response
    {
        $tournoi = $tournoiRepo->find($id);
        if (!$tournoi) {
            throw $this->createNotFoundException("Tournament #{$id} not found.");
        }

        return $this->render('front_office_dashboard/tournoi-matches.html.twig', [
            'tournoi' => $tournoi,
        ]);
    }
    #[Route('/front/dashboard/matches/{id}', name: 'app_front_match_show', methods: ['GET'])]
    public function showFrontMatch(int $id, MatchesRepository $matchesRepo): Response
    {
        $match = $matchesRepo->find($id);
        if (!$match) {
            throw $this->createNotFoundException("Match #{$id} not found.");
        }

        return $this->render('front_office_dashboard/match-details.html.twig', [
            'match' => $match,
        ]);
    }
}
