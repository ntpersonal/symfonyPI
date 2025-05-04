<?php

namespace App\Controller;

use App\Repository\MatchesRepository;
use App\Repository\TournoiRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;


use App\Entity\Team;
use Doctrine\ORM\EntityManagerInterface;
use App\Controller\TeamManagerCheckerController;
use App\Service\ApiFootballService;
use App\Service\ApiFootballService2;

use SebastianBergmann\Environment\Console;
use Symfony\Component\Security\Core\Security;
use App\Entity\Ranking;
use App\Entity\TeamRequest;
use App\Entity\User;
use Doctrine\ORM\EntityManager;

use Symfony\Component\HttpFoundation\JsonResponse;
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
        ApiFootballService2 $api_football,
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
        $sslCertPath = 'C:/xampp/php/extras/ssl/cacert.pem';
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
    #[Route('/front/dashboard/team/{id}', name: 'app_team_details')]
    public function team_details(int $id,Security $security, EntityManagerInterface $em): Response
    {
           /** @var User|null $user */
           $user = $security->getUser();

           $data = $this->getTeamRequestsData($user, $em);

        return $this->render('front_office_dashboard/team-details.html.twig', [
            'team' => null, // TODO: Fetch team data from database
            'teamRequests'    => $data['teamRequests'],
            'playerRequests'  => $data['playerRequests'],
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
    public function checkout(Request $request, ManagerRegistry $doctrine,  Security $security,
                             EntityManagerInterface $em): Response
    {
        /** @var User|null $user */
        $user = $security->getUser();
        $data = $this->getTeamRequestsData($user, $em);
        $session = $request->getSession();
        $cart = $session->get('cart', []);
        
        // Get cart items for the order summary
        $cartItems = [];
        $cartTotal = 0;
        
        $productRepo = $doctrine->getRepository(\App\Entity\Product::class);
        foreach ($cart as $productId => $quantity) {
            $product = $productRepo->find($productId);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $quantity
                ];
                $cartTotal += $product->getPriceproduct() * $quantity;
            }
        }
        
        return $this->render('front_office_dashboard/checkout.html.twig', [
            'cart_items' => $cartItems,
            'cart_total' => $cartTotal,
            'teamRequests'    => $data['teamRequests'],
            'playerRequests'  => $data['playerRequests'],
        ]);
    }

    #[Route('/front/dashboard/checkout/process', name: 'app_shop_checkout_process', methods: ['POST'])]
    public function checkoutProcess(Request $request, ManagerRegistry $doctrine, \App\Service\EmailService $emailService = null): Response
    {
        $session = $request->getSession();
        $cart = $session->get('cart', []);
        
        if (empty($cart)) {
            $this->addFlash('error', 'Your cart is empty');
            return $this->redirectToRoute('app_shop');
        }
        
        // Get form data
        $homeAddress = $request->request->get('homeaddress');
        $phoneNum = $request->request->get('phonenum');
        $email = $request->request->get('email');
        $stripeToken = $request->request->get('stripeToken');
        
        // Validate form data
        if (empty($homeAddress) || empty($phoneNum) || empty($email)) {
            $this->addFlash('error', 'Please fill in all required fields');
            return $this->redirectToRoute('app_checkout');
        }
        
        // Process the order
        $entityManager = $doctrine->getManager();
        $productRepo = $doctrine->getRepository(\App\Entity\Product::class);
        $user = $this->getUser();
        
        
        // Calculate total amount
        $totalAmount = 0;
        foreach ($cart as $productId => $quantity) {
            $product = $productRepo->find($productId);
            if ($product) {
                $totalAmount += $product->getPriceproduct() * $quantity;
                
                // Create order record for each product
                $order = new \App\Entity\Order();
                
                // Set user if available
                if ($user) {
                    $order->setUser($user);
                }
                
                $order->setDate(new \DateTime());
                $order->setQuantityOrder($quantity);
                $order->setProduct($product);
                $order->setStatus('paid'); // Assuming payment is successful
                $order->setTotalAmount($product->getPriceproduct() * $quantity);
                $order->setPhone((int)$phoneNum);
                $order->setAddress($homeAddress);
                
                $entityManager->persist($order);
            }
        }
        
        $entityManager->flush();
        
        // Clear the cart after successful order
        $session->remove('cart');
        
        // Send confirmation email
        try {
            // Get the last created order to send the email
            $lastOrder = null;
            foreach ($entityManager->getRepository(\App\Entity\Order::class)->findBy(
                ['date' => new \DateTime()],
                ['id' => 'DESC'],
                1
            ) as $o) {
                $lastOrder = $o;
                break;
            }
            
            if ($lastOrder && $emailService) {
                // Send the order confirmation email using the injected service
                $emailService->sendOrderConfirmation($lastOrder, $email);
            } else {
                // Fallback to file-based email if no order is found or no email service
                $emailContent = "Thank you for your order!\n\n";
                $emailContent .= "Order Details:\n";
                $emailContent .= "Total Amount: $" . number_format($totalAmount, 2) . "\n";
                $emailContent .= "Delivery Address: $homeAddress\n";
                $emailContent .= "Phone Number: $phoneNum\n";
                
                // Save email to file instead of sending via SMTP
                $emailFilePath = $this->getParameter('kernel.project_dir') . '/var/emails/';
                if (!is_dir($emailFilePath)) {
                    mkdir($emailFilePath, 0777, true);
                }
                
                $filename = 'order_confirmation_' . time() . '_' . uniqid() . '.txt';
                file_put_contents($emailFilePath . $filename, $emailContent);
            }
        } catch (\Exception $e) {
            // Log email error but don't stop the order process
            $logDir = $this->getParameter('kernel.project_dir') . '/var/log';
            if (!is_dir($logDir)) {
                mkdir($logDir, 0777, true);
            }
            
            file_put_contents(
                $logDir . '/email_errors.log',
                date('Y-m-d H:i:s') . ' - Error sending email: ' . $e->getMessage() . "\n",
                FILE_APPEND
            );
        }
        
        $this->addFlash('success', 'Your order has been placed successfully!');
        return $this->redirectToRoute('app_thank_you');
    }

    #[Route('/front/dashboard/cart', name: 'app_cart')]
    public function cart(EntityManagerInterface $entityManager, Security $security): Response
    { /** @var User $user */
        $user = $security->getUser();
        $data = $this->getTeamRequestsData($user, $entityManager);
        return $this->render('front_office_dashboard/cart.html.twig',[
            'teamRequests'   => $data['teamRequests'],
            'playerRequests' => $data['playerRequests'],
        ]);
        

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
    public function playerDetails(int $id,Security $security,EntityManagerInterface $em): Response
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

    /*#[Route('/front/dashboard/shop', name: 'app_shop')]
    public function shop(): Response
    {
        return $this->render('front_office_dashboard/shop.html.twig', [
            'products' => [], // TODO: Fetch products from database
            'currentPage' => 1,
            'totalPages' => 1
        ]);
    }
    */

    #[Route('/front/dashboard/product/{id}', name: 'app_product_details')]
    public function productDetails(int $id): Response
    {
        return $this->render('front_office_dashboard/product-details.html.twig', [
            'product' => null // TODO: Fetch product data from database
        ]);
    }
    
    #[Route('/front/dashboard/thank_you', name: 'app_thank_you')]
    public function thank_you( Security $security,
                               EntityManagerInterface $em): Response
    {
        /** @var User|null $user */
        $user = $security->getUser();
        $data = $this->getTeamRequestsData($user, $em);
        return $this->render('front_office_dashboard/thank-you.html.twig', [
            'teamRequests'   => $data['teamRequests'],
            'playerRequests' => $data['playerRequests'],
        ]);

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
 // src/Controller/FrontOfficeController.php

 #[Route('/front/dashboard/matches', name: 'app_front_matches', methods: ['GET'])]
 public function matches(
     Request $request,
     MatchesRepository $matchesRepository,
     ApiFootballService $apiFootballService,
     Security $security, 
     EntityManagerInterface $em
 ): Response {
       /** @var User|null $user */
       $user = $security->getUser();

       $data = $this->getTeamRequestsData($user, $em);
     // 1) Get filters
     $teamFilter   = $request->query->get('team', '');
     $statusFilter = $request->query->get('status', '');
 
     // 2) Local matches query
     $qb = $matchesRepository->createQueryBuilder('m')
         ->join('m.teamA', 'teamA')
         ->join('m.teamB', 'teamB')
         ->orderBy('m.matchTime', 'DESC');
 
     if ($teamFilter !== '') {
         $qb->andWhere('teamA.nom LIKE :team OR teamB.nom LIKE :team')
            ->setParameter('team', "%{$teamFilter}%");
     }
 
     if ($statusFilter !== '') {
         $qb->andWhere('m.status = :status')
            ->setParameter('status', $statusFilter);
     }
 
     $localMatches = $qb->getQuery()->getResult();
 
     // 3) Fetch API matches
     $season     = 2024;
     $allLeagues = $apiFootballService->getLeagues($season);
     $wantedLeagues = [
         'Premier League',
         'La Liga',
         'Bundesliga',
         'Serie A',
         'Ligue 1',
         'Tunisian Ligue Professionnelle 1',
         'Tunisian Cup',
         'UEFA Champions League',
         'UEFA Europa League',
         'UEFA Europa Conference League',
     ];
     $filteredLeagues = array_filter(
         $allLeagues,
         fn(array $league) => in_array($league['league_name'], $wantedLeagues, true)
     );
 
     $apiMatches = [];
     foreach ($filteredLeagues as $league) {
         $fixtures = $apiFootballService->getEvents((int) $league['league_id'], $season);
         foreach ($fixtures as $fixture) {
             if (isset($fixture['match_id'])) {
                 $apiMatches[] = $fixture;
             }
         }
     }
 
     // 4) Apply team/status filters to API matches too
     if ($teamFilter !== '' || $statusFilter !== '') {
         $apiMatches = array_filter($apiMatches, function(array $match) use ($teamFilter, $statusFilter) {
             $teamMatch   = true;
             $statusMatch = true;
 
             if ($teamFilter !== '') {
                 $teamMatch =
                     stripos($match['match_hometeam_name'], $teamFilter) !== false ||
                     stripos($match['match_awayteam_name'], $teamFilter) !== false;
             }
 
             if ($statusFilter !== '') {
                 $apiStatus = match ($match['match_status']) {
                     'FT', 'AET', 'FT_PEN'    => 'FINISHED',
                     'NS', 'TBA', 'CANC',
                     'PST', 'SUSP', 'INT',
                     'ABD', 'AWD', 'WO'       => 'UPCOMING',
                     '1H', '2H', 'HT',
                     'ET', 'P', 'BT', 'LIVE'  => 'LIVE',
                     default                  => null,
                 };
                 $statusMatch = ($apiStatus === $statusFilter);
             }
 
             return $teamMatch && $statusMatch;

         });
         // Re-index to avoid gaps
         $apiMatches = array_values($apiMatches);
     }
 
     // 5) Render
     if ($request->isXmlHttpRequest()) {
         return $this->render('front_office_dashboard/_matches_container.html.twig', [
             'matches'    => $localMatches,
             'apiMatches' => $apiMatches,
             'season'     => $season,
         ]);
     }

    return $this->render('front_office_dashboard/matches.html.twig', [
         'matches'    => $localMatches,
         'apiMatches' => $apiMatches,
         'season'     => $season,
         'teamRequests'    => $data['teamRequests'],
         'playerRequests'  => $data['playerRequests'],
     ]);
 }
 
 

    // #[Route('/front/dashboard/matches', name: 'app_front_matches')]
    // public function matches(
    //     MatchesRepository  $matchesRepo,
    //     ApiFootballService $api
    // ): Response {
    //     // 1) your local DB matches
    //     $localMatches = $matchesRepo->findBy([], ['matchTime' => 'DESC']);

    //     // 2) pick a season
    //     $season = 2024;

    //     // 3) get all leagues for that season
    //     $allLeagues = $api->getLeagues($season);

    //     // 4) filter to just the ones you want
    //     $wanted = [
    //         'Premier League',
    //         'La Liga',
    //         'Bundesliga',
    //         'Serie A',
    //         'Ligue 1',
    //         'Tunisian Ligue Professionnelle 1',
    //         'Tunisian Cup',
    //         'UEFA Champions League',
    //         'UEFA Europa League',
    //         'UEFA Europa Conference League',
    //     ];

    //     $filteredLeagues = array_filter(
    //         $allLeagues,
    //         fn(array $L) => in_array($L['league_name'], $wanted, true)
    //     );

    //     // 5) for each league, fetch *only* its matches
    //     $apiMatches = [];
    //     foreach ($filteredLeagues as $L) {
    //         $leagueId = (int) $L['league_id'];
    //         $fixtures = $api->getEvents($leagueId, $season);
    
    //         // only keep the ones that are actually arrays
    //         foreach ($fixtures as $f) {
    //             if (is_array($f) && isset($f['match_id'])) {
    //                 $apiMatches[] = $f;
    //             }
    //         }
    //     }

    //     // 6) render both local + API
    //     return $this->render('front_office_dashboard/matches.html.twig', [
    //         'matches'    => $localMatches,
    //         'apiMatches' => $apiMatches,
    //         'season'     => $season,
    //     ]);
    // }

    #[Route('/front/dashboard/api-match/{matchId}', name: 'app_front_api_match_show', methods: ['GET'])]
    public function showApiMatch(
        int                $matchId,
        ApiFootballService $api,
        Security $security, 
        EntityManagerInterface $em
    ): Response {
           /** @var User|null $user */
       $user = $security->getUser();
         $data = $this->getTeamRequestsData($user, $em);                
        // 1) fetch the single match
        $match = $api->getEventById($matchId);
        if (!$match) {
            throw $this->createNotFoundException("API match #{$matchId} not found.");
        }
    
        // 2) fetch each team’s full info
        $homeTeam = $api->getTeamById((int)$match['match_hometeam_id']);
        $awayTeam = $api->getTeamById((int)$match['match_awayteam_id']);

        $contextData = [
            'teamA'  => $match['match_hometeam_name'],
            'teamB'  => $match['match_awayteam_name'],
            'date'   => "{$match['match_date']} {$match['match_time']}",
            'status' => $match['match_status'],
            'league' => $match['league_name']
        ];
        
    
        return $this->render('front_office_dashboard/api-match-details.html.twig', [
            'match'    => $match,
            'homeTeam' => $homeTeam,
            'awayTeam' => $awayTeam,
            'contextType' => 'api_match',
            'contextId'   => $match['match_id'],
            'contextData' => $contextData,
            'teamRequests'    => $data['teamRequests'],
            'playerRequests'  => $data['playerRequests'],
        ]);
    }


// src/Controller/FrontOfficeController.php
    #[Route('/front/dashboard/tournois', name: 'app_front_tournois')]
public function tournois(
    TournoiRepository  $tournoiRepo,
    ApiFootballService $api,
    Security $security, 
    EntityManagerInterface $em
): Response {
       /** @var User|null $user */
       $user = $security->getUser();

       $data = $this->getTeamRequestsData($user, $em);
    // 1) your local tournaments
        $tournois = $tournoiRepo->findBy([], ['start_date' => 'DESC']);

    // 2) fetch all leagues+cups for the season in one call
    $season = 2024;
    $all     = $api->getLeagues($season);  // one HTTP request

    // 3) define exactly the names you care about
    $wanted = [
      // top 5 European leagues
      'Premier League',
      'La Liga',
      'Bundesliga',
      'Serie A',
      'Ligue 1',

      // Tunisia
      'Tunisian Ligue Professionnelle 1',
      'Tunisian Cup',

      // UEFA cups
      'UEFA Champions League',
      'UEFA Europa League',
      'UEFA Europa Conference League',
    ];

    // 4) filter locally
    $externalLeagues = array_filter($all, function(array $L) use($wanted) {
      return in_array($L['league_name'], $wanted, true);
    });
    // (re‐index if you like)
    $externalLeagues = array_values($externalLeagues);

    // 5) render!
        return $this->render('front_office_dashboard/tournois.html.twig', [
      'tournois'        => $tournois,
      'externalLeagues' => $externalLeagues,
      'teamRequests'    => $data['teamRequests'],
      'playerRequests'  => $data['playerRequests'],
        ]);
    }


    #[Route('/front/dashboard/tournois/{id}', name: 'app_front_tournoi_show', methods: ['GET'])]
    public function showTournoi(int $id, TournoiRepository $tournoiRepo,  Security $security, 
    EntityManagerInterface $em): Response
    {
            /** @var User|null $user */
       $user = $security->getUser();

       $data = $this->getTeamRequestsData($user, $em);
        $tournoi = $tournoiRepo->find($id);
        if (!$tournoi) {
            throw $this->createNotFoundException("Tournament #{$id} not found.");
        }

        return $this->render('front_office_dashboard/tournoi-matches.html.twig', [
            'tournoi' => $tournoi,
            'teamRequests'    => $data['teamRequests'],
            'playerRequests'  => $data['playerRequests'],
        ]);
    }
    // #[Route('/front/dashboard/matches/{id}', name: 'app_front_match_show', methods: ['GET'])]
    // public function showFrontMatch(int $id, MatchesRepository $matchesRepo): Response
    // {
    //     $match = $matchesRepo->find($id);
    //     if (!$match) {
    //         throw $this->createNotFoundException("Match #{$id} not found.");
    //     }

    //     return $this->render('front_office_dashboard/match-details.html.twig', [
    //         'match' => $match,
    //     ]);
    // }
    #[Route('/front/dashboard/matches/{id}', name: 'app_front_match_show', methods: ['GET'])]
    public function showFrontMatch(
        int               $id,
        MatchesRepository $matchesRepo,
        UserRepository    $userRepo ,
        Security $security, 
        EntityManagerInterface $em,
                  
    ): Response {
            /** @var User|null $user */
       $user = $security->getUser();

       $data = $this->getTeamRequestsData($user, $em);
        // 1) load match
        $match = $matchesRepo->find($id);
        if (!$match) {
            throw $this->createNotFoundException("Match #{$id} not found.");
        }

        // 2) load players for each team
        $homeTeam = $match->getTeamA();
        $awayTeam = $match->getTeamB();
        $homeUsers = $homeTeam
            ? $userRepo->findBy(['team' => $homeTeam])
            : [];
        $awayUsers = $awayTeam
            ? $userRepo->findBy(['team' => $awayTeam])
            : [];

        // 3) fixed “formation” coordinates on 600×800 canvas
        $formation = [
            [300,100],                // GK
            [150,150],[250,150],[350,150],[450,150], // Def
            [200,250],[300,250],[400,250],           // Mid
            [200,350],[300,350],[400,350],           // Forw
        ];

        // 4) map to name + coords for home
        $playersHome = [];
        foreach ($formation as $i => [$x,$y]) {
            if (!isset($homeUsers[$i])) {
                continue;
            }
            $u = $homeUsers[$i];
            $playersHome[] = [
                'name' => $u->getFirstname().' '.$u->getLastname(),
                'x'    => $x,
                'y'    => $y,
            ];
        }

        // 5) mirror Y for away
        $canvasH = 800;
        $playersAway = [];
        foreach ($formation as $i => [$x,$y]) {
            if (!isset($awayUsers[$i])) {
                continue;
            }
            $u = $awayUsers[$i];
            $playersAway[] = [
                'name' => $u->getFirstname().' '.$u->getLastname(),
                'x'    => $x,
                'y'    => $canvasH - $y,
            ];
        }



        $contextData = [
            'teamA'      => $match->getTeamA()->getNom(),
            'teamB'      => $match->getTeamB()->getNom(),
            'date'       => $match->getMatchTime()->format('Y-m-d H:i'),
            'status'     => $match->getStatus(),
            'tournament' => $match->getTournoi()?->getNom()
        ];
        
        // 6) render with 4 new Twig vars
        return $this->render('front_office_dashboard/match-details.html.twig', [
            'match'       => $match,
            'playersHome' => $playersHome,
            'playersAway' => $playersAway,
            'contextType' => 'local_match',
            'contextId'   => $match->getId(),
            'contextData' => $contextData,
            'teamRequests'    => $data['teamRequests'],
            'playerRequests'  => $data['playerRequests'],
        ]);
    }

 // src/Controller/FrontOfficeController.php
 #[Route('/front/dashboard/league/{leagueId}/{season}/fixtures', name: 'app_front_league_fixtures')]
 public function leagueFixtures(
     int                $leagueId,
     int                $season,
     ApiFootballService $api,
     Security $security, 
     EntityManagerInterface $em
 ): Response {
         /** @var User|null $user */
         $user = $security->getUser();
    
         $data = $this->getTeamRequestsData($user, $em);
     // Fetch raw fixtures keyed by “event_id” etc.
     $raw       = $api->getEvents($leagueId, $season);
     // Discard numeric keys so Twig sees each element as an array
     $fixtures  = array_values($raw);
 
     return $this->render('front_office_dashboard/league-fixtures.html.twig', [
         'fixtures' => $fixtures,
         'leagueId' => $leagueId,
         'season'   => $season,
         'teamRequests'    => $data['teamRequests'],
         'playerRequests'  => $data['playerRequests'],
     ]);
 }
}
