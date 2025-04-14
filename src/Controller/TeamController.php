<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request; // Added missing import
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Team;
use Knp\Component\Pager\PaginatorInterface;

final class TeamController extends AbstractController
{
    #[Route('/admin/dashboard/Teams', name: 'app_admin_dashborad_tables')]
    public function tables(Request $request, ManagerRegistry $doctrine, PaginatorInterface $paginator): Response
    {
        $teams = $doctrine->getRepository(Team::class)->findAll();
        $pagination = $paginator->paginate(
            $teams,
            $request->query->getInt('page', 1),
            5 // Number of items per page
        );
        
        return $this->render('admin_dashboard/teams.html.twig',[
            'teams' => $pagination,
        ]);
    }
    #[Route('/admin/teams/add', name: 'app_admin_team_add', methods: ['POST'])]
    public function addTeam(Request $request, ManagerRegistry $doctrine): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            
            $team = new Team();
            $team->setNom($data['nom']);
            $team->setCategorie($data['categorie']);
            $team->setModeJeu($data['modeJeu']);
            $team->setNombreJoueurs($data['nombreJoueurs']);
            
            $entityManager = $doctrine->getManager();
            $entityManager->persist($team);
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
            return $this->json(['success' => false, 'message' => 'Error adding team'], 500);
        }
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
}
