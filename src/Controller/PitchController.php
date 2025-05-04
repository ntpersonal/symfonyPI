<?php
// src/Controller/PitchController.php

namespace App\Controller;

use App\Repository\MatchesRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PitchController extends AbstractController
{
    /**
     * @Route("/front/dashboard/pitch/{id}", name="app_pitch_show")
     */
    public function showPitch(
        int $id,
        MatchesRepository $matchesRepo,
        UserRepository  $userRepo
    ): Response {
        // 1) fetch the match
        $match = $matchesRepo->find($id);
        if (!$match) {
            throw $this->createNotFoundException(sprintf('Match #%d not found.', $id));
        }

        // 2) fetch players by team
        $homeTeam = $match->getTeamA();
        $awayTeam = $match->getTeamB();
        $homePlayers = $userRepo->findBy(['team' => $homeTeam]);
        $awayPlayers = $userRepo->findBy(['team' => $awayTeam]);

        // 3) your fixed pitch-positions (x,y)
        $formation = [
            [300, 100],               // GK
            [150, 150], [250, 150], [350, 150], [450, 150], // Defenders
            [200, 250], [300, 250], [400, 250],             // Midfielders
            [200, 350], [300, 350], [400, 350],             // Forwards
        ];

        // 4) build home-side nodes
        $playersHome = [];
        foreach ($formation as $i => [$x, $y]) {
            if (!isset($homePlayers[$i])) {
                continue;
            }
            $u = $homePlayers[$i];
            $playersHome[] = [
                'name' => $u->getFirstname().' '.$u->getLastname(),
                'x'    => $x,
                'y'    => $y,
            ];
        }

        // 5) build away-side nodes by mirroring Y around canvas height (800px)
        $canvasHeight = 800;
        $playersAway = [];
        foreach ($formation as $i => [$x, $y]) {
            if (!isset($awayPlayers[$i])) {
                continue;
            }
            $u = $awayPlayers[$i];
            $playersAway[] = [
                'name' => $u->getFirstname().' '.$u->getLastname(),
                'x'    => $x,
                'y'    => $canvasHeight - $y,
            ];
        }

        // 6) render pitch template
        return $this->render('pitch/show.html.twig', [
            'playersHome' => $playersHome,
            'playersAway' => $playersAway,
        ]);
    }
}
