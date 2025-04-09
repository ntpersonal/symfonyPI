<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request; // Added missing import
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Team;
use App\Entity\Tournoi;

final class AdminDashboradController extends AbstractController
{
    #[Route('/admin/dashborad', name: 'app_admin_dashborad')]
    public function index(): Response
    {
        return $this->render('admin_dashborad/dashboard.html.twig', [
            'controller_name' => 'AdminDashboradController',
        ]);
    }

    #[Route('/admin/dashborad/profile', name: 'app_admin_dashborad_profile')]
    public function profile(): Response
    {
        return $this->render('admin_dashborad/profile.html.twig');
    }

    #[Route('/admin/dashborad/Teams', name: 'app_admin_dashborad_tables')]
    public function tables(Request $request, ManagerRegistry $doctrine): Response
    {
        $teams = $doctrine->getRepository(Team::class)->findAll();
        return $this->render('admin_dashborad/teams.html.twig',[
            'teams' => $teams,
        ]);
    }
    #[Route('/admin/dashborad/Tournoi', name: 'app_admin_dashborad_Tournoi')]
    public function tournoi(Request $request, ManagerRegistry $doctrine): Response
    {
        $tournois = $doctrine->getRepository(Tournoi::class)->findAll();
        return $this->render('admin_dashborad/tournoi.html.twig',[
            'tournois' => $tournois,
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

    #[Route('/admin/tournoi/{id}/delete', name: 'app_admin_tournoi_delete', methods: ['DELETE'])]
    public function deleteTournoi(int $id, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $tournoi = $entityManager->getRepository(Tournoi::class)->find($id);

        if (!$tournoi) {
            return $this->json(['success' => false, 'message' => 'Tournament not found'], 404);
        }

        try {
            $entityManager->remove($tournoi);
            $entityManager->flush();
            return $this->json(['success' => true]);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'message' => 'Error deleting tournament'], 500);
        }
    }

    #[Route('/admin/tournoi/{id}/edit', name: 'app_admin_tournoi_edit', methods: ['PUT'])]
    public function editTournoi(int $id, Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $tournoi = $entityManager->getRepository(Tournoi::class)->find($id);

        if (!$tournoi) {
            return $this->json(['success' => false, 'message' => 'Tournament not found'], 404);
        }

        try {
            $data = json_decode($request->getContent(), true);
            
            $tournoi->setNom($data['nom']);
            $tournoi->setFormat($data['format']);
            $tournoi->setSportType($data['sportType']);
            $tournoi->setNbEquipe($data['nbEquipe']);
            $tournoi->setStatus($data['status']);
            
            $entityManager->flush();
            
            return $this->json([
                'success' => true,
                'tournoi' => [
                    'id' => $tournoi->getId(),
                    'nom' => $tournoi->getNom(),
                    'format' => $tournoi->getFormat(),
                    'sportType' => $tournoi->getSportType(),
                    'nbEquipe' => $tournoi->getNbEquipe(),
                    'status' => $tournoi->getStatus()
                ]
            ]);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'message' => 'Error updating tournament'], 500);
        }
    }

    #[Route('/admin/dashborad/virtual-reality', name: 'app_admin_dashborad_virtual_reality')]
    public function virtual_reality(): Response
    {
        return $this->render('admin_dashborad/virtual-reality.html.twig');
    }

    #[Route('/admin/dashborad/sign-in', name: 'app_admin_dashborad_sign_in')]
    public function sign_in(): Response
    {
        return $this->render('admin_dashborad/sign-in.html.twig');
    }

    #[Route('/admin/dashborad/sign-up', name: 'app_admin_dashborad_sign_up')]
    public function sign_up(): Response
    {
        return $this->render('admin_dashborad/sign-up.html.twig');
    }


    #[Route('/admin/dashborad/rtl', name: 'app_admin_dashborad_rtl')]
    public function rtl(): Response
    {
        return $this->render('admin_dashborad/rtl.html.twig');
    }
    #[Route('/admin/dashborad/billing', name: 'app_admin_dashborad_billing')]
    public function billing(): Response
    {
        return $this->render('admin_dashborad/billing.html.twig');
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
    #[Route('/admin/tournoi/add', name: 'app_admin_tournoi_add', methods: ['POST'])]
    public function addTournoi(Request $request, ManagerRegistry $doctrine): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            
            $tournoi = new Tournoi();
            $tournoi->setNom($data['nom']);
            $tournoi->setFormat($data['format']);
            $tournoi->setSportType($data['sportType']);
            $tournoi->setNbEquipe((int)$data['nbEquipe']); // Convert to integer
            
            // Convert date strings to DateTime objects
            if (!empty($data['start_date'])) {
                $startDate = new \DateTime($data['start_date']);
                $tournoi->setStart_date($startDate);
            }
            
            if (!empty($data['end_date'])) {
                $endDate = new \DateTime($data['end_date']);
                $tournoi->setEnd_date($endDate);
            }
            
            $tournoi->setTournoiLocation($data['tournoiLocation']);
            $tournoi->setReglements($data['reglements']);
            $tournoi->setStatus($data['status'] ?? 'Pending');
            
            $entityManager = $doctrine->getManager();
            $entityManager->persist($tournoi);
            $entityManager->flush();
            
            return $this->json([
                'success' => true,
                'tournoi' => [
                    'id' => $tournoi->getId(),
                    'nom' => $tournoi->getNom(),
                    'format' => $tournoi->getFormat(),
                    'sportType' => $tournoi->getSportType(),
                    'nbEquipe' => $tournoi->getNbEquipe(),
                    'start_date' => $tournoi->getStart_date() ? $tournoi->getStart_date()->format('Y-m-d') : null,
                    'end_date' => $tournoi->getEnd_date() ? $tournoi->getEnd_date()->format('Y-m-d') : null,
                    'tournoiLocation' => $tournoi->getTournoiLocation(),
                    'reglements' => $tournoi->getReglements(),
                    'status' => $tournoi->getStatus()
                ]
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false, 
                'message' => 'Error adding tournoi: ' . $e->getMessage()
            ], 500);
        }
    }
    
    
    
}
