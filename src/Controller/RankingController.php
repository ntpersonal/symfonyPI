<?php

namespace App\Controller;

use App\Entity\Matches;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Team;
use App\Entity\Ranking;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

final class RankingController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/ranking', name: 'app_ranking')]
    public function index(): Response
    {
        return $this->render('ranking/index.html.twig', [
            'controller_name' => 'RankingController',
        ]);
    }
    #[Route('/admin/teams/{id}/rankings', name: 'app_team_rankings', methods: ['GET'])]
    public function getTeamRankings(Team $team): JsonResponse
    {
        $this->updateTeamRankings($team);
        try {
            $rankings = $this->entityManager->getRepository(Ranking::class)
                ->findBy(['team' => $team], ['position' => 'ASC']);

            $rankingsData = array_map(function($ranking) {
                return [
                    'tournamentName' => $ranking->getTournoi()->getNom(),
                    'position' => $ranking->getPosition(),
                    'points' => $ranking->getPoints(),
                    'wins' => $ranking->getWins(),
                    'draws' => $ranking->getDraws(),
                    'losses' => $ranking->getLosses(),
                    'goalsScored' => $ranking->getGoalsScored(),
                    'goalsConceded' => $ranking->getGoalsConceded(),
                    'goalDifference' => $ranking->getGoalDifference()
                ];
            }, $rankings);

            return new JsonResponse(['rankings' => $rankingsData]);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Failed to fetch rankings'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    private function updateTeamRankings(Team $team): void
    {
        $em = $this->entityManager;
        $rankingRepo = $em->getRepository(Ranking::class);
        $matchesRepo = $em->getRepository(Matches::class);

        // 1. Récupère tous les Ranking pour cette équipe
        $rankings = $rankingRepo->findBy(['team' => $team]);

        foreach ($rankings as $ranking) {
            $tournoi = $ranking->getTournoi();

            // 2. Récupère tous les matches “finished” où l’équipe est A ou B
            $matchesA = $matchesRepo->findBy([
                'tournoi' => $tournoi,
                'teamA'   => $team,
                'status'  => 'finished',
            ]);
            $matchesB = $matchesRepo->findBy([
                'tournoi' => $tournoi,
                'teamB'   => $team,
                'status'  => 'finished',
            ]);

            // 3. Calcule victoires, nuls, défaites et buts
            $wins = $draws = $losses = $goalsFor = $goalsAgainst = 0;

            foreach ($matchesA as $m) {
                $gf = $m->getScoreTeamA();
                $ga = $m->getScoreTeamB();
                $goalsFor     += $gf;
                $goalsAgainst += $ga;
                if ($gf > $ga)      $wins++;
                elseif ($gf < $ga)  $losses++;
                else                $draws++;
            }
            foreach ($matchesB as $m) {
                $gf = $m->getScoreTeamB();
                $ga = $m->getScoreTeamA();
                $goalsFor     += $gf;
                $goalsAgainst += $ga;
                if ($gf > $ga)      $wins++;
                elseif ($gf < $ga)  $losses++;
                else                $draws++;
            }

            $points = $wins * 3 + $draws;
            $diff   = $goalsFor - $goalsAgainst;

            // 4. Met à jour l’entité Ranking
            $ranking
                ->setWins($wins)
                ->setDraws($draws)
                ->setLosses($losses)
                ->setGoalsScored($goalsFor)
                ->setGoalsConceded($goalsAgainst)
                ->setGoalDifference($diff)
                ->setPoints($points);

            $em->persist($ranking);
        }

        // 5. Flush unique pour tout prendre en compte
        $em->flush();
    }
}
