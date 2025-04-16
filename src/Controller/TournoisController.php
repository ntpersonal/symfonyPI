<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request; // Added missing import
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Tournoi;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
final class TournoisController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/admin/dashboard/Tournoi', name: 'app_admin_dashborad_Tournoi')]
    public function tournoi(Request $request, ManagerRegistry $doctrine): Response
    {
        $tournois = $doctrine->getRepository(Tournoi::class)->findAll();
        return $this->render('admin_dashboard/tournoi.html.twig',[
            'tournois' => $tournois,
        ]);
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
    #[Route('/admin/tournaments/available', name: 'app_tournaments_available', methods: ['GET'])]
    public function getAvailableTournaments(ManagerRegistry $doctrine): JsonResponse
    {
        try {
            $tournaments = $doctrine->getRepository(Tournoi::class)
                ->findBy(['status' => 'Pending'], ['start_date' => 'ASC']);

            $tournamentsData = array_map(function($tournament) {
                return [
                    'id' => $tournament->getId(),
                    'nom' => $tournament->getNom(),
                    'start_date' => $tournament->getStart_date()->format('Y-m-d'),
                    'end_date' => $tournament->getEnd_date()->format('Y-m-d'),
                    'format' => $tournament->getFormat(),
                    'sportType' => $tournament->getSportType(),
                    'nbEquipe' => $tournament->getNbEquipe()
                ];
            }, $tournaments);

            return new JsonResponse(['tournaments' => $tournamentsData]);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Failed to fetch tournaments'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
