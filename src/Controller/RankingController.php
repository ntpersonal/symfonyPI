<?php

namespace App\Controller;

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
}
