<?php

namespace App\Controller;

use App\Repository\MatchesRepository;
use App\Repository\TournoiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\ApiFootballService;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;


final class FrontOfficeController extends AbstractController
{
    #[Route('/front/dashboard', name: 'app_front_office')]
    public function index(): Response
    {
        // TODO: Replace this with actual player data from your database
        $player = [
            'id' => 1,
            'name' => 'John Doe',
            'role' => 'FORWARD',
            'description' => 'There are so many sports available in the world nowadays, but we can categorize them by the numbers of players, the three main categories are individual sport, dual sport.'
        ];

        return $this->render('front_office_dashboard/index.html.twig', [
            'controller_name' => 'FrontOfficeController',
            'player' => $player
        ]);
    }

    #[Route('/front/dashboard/home1', name: 'app_home1')]
    public function home1(): Response
    {
        return $this->render('front_office_dashboard/index.html.twig');
    }
    #[Route('/front/dashboard/team', name: 'app_team')]
    public function team(): Response
    {
        return $this->render('front_office_dashboard/team.html.twig');
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
    public function score(): Response
    {
        return $this->render('front_office_dashboard/score.html.twig');
    }

    #[Route('/front/dashboard/player/{id}', name: 'app_player_details')]
    public function playerDetails(int $id): Response
    {
        return $this->render('front_office_dashboard/player-details.html.twig', [
            'player' => null // TODO: Fetch player data from database
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
 // src/Controller/FrontOfficeController.php

 #[Route('/front/dashboard/matches', name: 'app_front_matches', methods: ['GET'])]
 public function matches(
     Request $request,
     MatchesRepository $matchesRepository,
     ApiFootballService $apiFootballService
 ): Response {
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
        ApiFootballService $api
    ): Response {
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
            'contextData' => $contextData
        ]);
    }


// src/Controller/FrontOfficeController.php
#[Route('/front/dashboard/tournois', name: 'app_front_tournois')]
public function tournois(
    TournoiRepository  $tournoiRepo,
    ApiFootballService $api
): Response {
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
        UserRepository    $userRepo           
    ): Response {
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
            'contextData' => $contextData
        ]);
    }

 // src/Controller/FrontOfficeController.php
 #[Route('/front/dashboard/league/{leagueId}/{season}/fixtures', name: 'app_front_league_fixtures')]
 public function leagueFixtures(
     int                $leagueId,
     int                $season,
     ApiFootballService $api
 ): Response {
     // Fetch raw fixtures keyed by “event_id” etc.
     $raw       = $api->getEvents($leagueId, $season);
     // Discard numeric keys so Twig sees each element as an array
     $fixtures  = array_values($raw);
 
     return $this->render('front_office_dashboard/league-fixtures.html.twig', [
         'fixtures' => $fixtures,
         'leagueId' => $leagueId,
         'season'   => $season,
     ]);
 }
}
