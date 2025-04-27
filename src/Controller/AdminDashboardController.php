<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Team;
use App\Entity\Tournoi;
use App\Entity\User;


final class AdminDashboardController extends AbstractController
{
    #[Route('/admin/dashboard', name: 'app_admin_dashboard')]
    public function index(
        UserRepository $userRepository,
        EntityManagerInterface $entityManager
    ): Response
    {
        // User statistics
        $totalUsers = $userRepository->count([]);
        $activeUsers = $userRepository->count(['is_active' => true]);
        $playerUsers = $userRepository->count(['role' => 'player']);
        $organizerUsers = $userRepository->count(['role' => 'organizer']);


        // Growth metrics
        $newUsersThisMonth = $userRepository->countUsersRegisteredThisMonth();
        $userGrowthRate = $this->calculateGrowthRate($userRepository);

        return $this->render('admin_dashboard/dashboard.html.twig', [
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'playerUsers' => $playerUsers,
            'organizerUsers' => $organizerUsers,

            'newUsersThisMonth' => $newUsersThisMonth,
            'userGrowthRate' => $userGrowthRate,
        ]);
    }

    private function calculateGrowthRate(UserRepository $repository): int
    {
        $usersLastMonth = $repository->countUsersRegisteredLastMonth();
        $usersThisMonth = $repository->countUsersRegisteredThisMonth();

        if ($usersLastMonth === 0) {
            return $usersThisMonth > 0 ? 100 : 0;
        }

        return intval((($usersThisMonth - $usersLastMonth) / $usersLastMonth) * 100);
    }


    #[Route('/admin/dashboard/profile', name: 'app_admin_dashboard_profile')]
    public function profile(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_log_in');
        }

        return $this->render('admin_dashboard/profile.html.twig', [
            'user' => $user
        ]);
    }

    #[Route('/admin/dashboard/teams', name: 'app_admin_dashboard_teams')]
    public function tables(Request $request, ManagerRegistry $doctrine): Response
    {
        $teams = $doctrine->getRepository(Team::class)->findAll();
        return $this->render('admin_dashboard/teams.html.twig', [
            'teams' => $teams,
        ]);
    }

    #[Route('/admin/dashboard/tournoi', name: 'app_admin_dashboard_tournoi')]
    public function tournoi(Request $request, ManagerRegistry $doctrine): Response
    {
        $tournois = $doctrine->getRepository(Tournoi::class)->findAll();
        return $this->render('admin_dashboard/tournoi.html.twig', [
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
            return $this->json(['success' => false, 'message' => 'Error deleting team: ' . $e->getMessage()], 500);
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

    #[Route('/admin/dashboard/virtual-reality', name: 'app_admin_dashboard_virtual_reality')]
    public function virtual_reality(): Response
    {
        return $this->render('admin_dashboard/virtual-reality.html.twig');
    }

    #[Route('/admin/dashboard/rtl', name: 'app_admin_dashboard_rtl')]
    public function rtl(): Response
    {
        return $this->render('admin_dashboard/rtl.html.twig');
    }

    #[Route('/admin/dashboard/billing', name: 'app_admin_dashboard_billing')]
    public function billing(): Response
    {
        return $this->render('admin_dashboard/billing.html.twig');
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
