<?php

namespace App\Controller;

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

final class TeamController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/admin/dashboard/Teams', name: 'app_admin_dashboard_teams', methods: ['GET', 'POST'])]
    public function tables(Request $request, ManagerRegistry $doctrine, PaginatorInterface $paginator): Response
    {
        $teams = $doctrine->getRepository(Team::class)->findBy([], ['id' => 'DESC']);
        $pagination = $paginator->paginate(
            $teams,
            $request->query->getInt('page', 1),
            5 // Number of items per page
        );
        
        $team = new Team();
        $form = $this->createForm(TeamType::class, $team);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $entityManager = $doctrine->getManager();
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
}
