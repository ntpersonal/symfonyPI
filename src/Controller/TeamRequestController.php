<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Team;
use App\Entity\TeamRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Security\Core\Security;
use App\Entity\User;
use App\Controller\TeamManagerCheckerController;
final class TeamRequestController extends AbstractController
{
    #[Route('/team/{id}/request-join', name: 'team_request_join', methods: ['POST'])]
    #[IsGranted('ROLE_PLAYER')]
    public function requestJoin(
        Team $team,
        EntityManagerInterface $em,
        HubInterface $hub,
        Security $security,
    ): Response {
        /** @var User $user */
        $user = $security->getUser();
        
        // Check if request already exists
        $existingRequest = $em->getRepository(TeamRequest::class)->findOneBy([
            'player' => $user,
            'team' => $team,
            'status' => 'pending'
        ]);
        
        if ($existingRequest) {
            return $this->json(['error' => 'You already have a pending request'], 400);
        }
        
        // Create new request
        $request = new TeamRequest();
        $request->setPlayer($user??null);
        $request->setTeam($team);
        $request->setStatus('pending');
        $request->setCreatedAt(new \DateTime());
        
        $em->persist($request);
        $em->flush();
        
        // Notify team manager via Mercure
        $update = new Update(
            ['/team/'.$team->getId().'/requests', '/user/'.$user->getId().'/notifications'],
            json_encode([
                'type' => 'team_join_request',
                'message' => $user->getFirstname().' '.$user->getLastname().' wants to join your team',
                'requestId' => $request->getId(),
                'teamId' => $team->getId(),
                'playerId' => $user->getId()
            ])
        );
        $hub->publish($update);
        
        return $this->json(['success' => true]);
    }
    
    #[Route('/team-request/{id}/accept', name: 'team_request_accept', methods: ['POST'])]
    #[IsGranted('ROLE_ORGANIZER')]
    public function acceptRequest(
        TeamRequest $request,
        EntityManagerInterface $em,
        HubInterface $hub,
        Security $security, 
         TeamManagerCheckerController $checker,
    ): Response {
        /** @var User $currentUser */
        $currentUser = $security->getUser();
        $team = $request->getTeam();
        
        // Verify current user is team manager using TeamManagerCheckerController
        if (!$checker->isTeamManager($team, $currentUser)) {
            return $this->json(['error' => 'Unauthorized – You are not the team manager'], 403);
        }

        
        // Update request status
        $request->setStatus('accepted');
        $request->setProccedAt(new \DateTime());
        
        // Add player to team
        $player = $request->getPlayer();
        $player->setTeam($team);
        
        $em->flush();
        
        // Notify player via Mercure
        $update = new Update(
            ['/user/'.$player->getId().'/notifications'],
            json_encode([
                'type' => 'team_join_accepted',
                'message' => 'Your request to join '.$team->getNom().' has been accepted',
                'teamId' => $team->getId()
            ])
        );
        $hub->publish($update);
        
        return $this->json(['success' => true]);
    }
    
    #[Route('/team-request/{id}/reject', name: 'team_request_reject', methods: ['POST'])]
    #[IsGranted('ROLE_ORGANIZER')]
    public function rejectRequest(
        TeamRequest $request,
        EntityManagerInterface $em,
        HubInterface $hub,
        Security $security,
        TeamManagerCheckerController $teamManagerChecker
    ): Response {
        /** @var User $currentUser */
        $currentUser = $security->getUser();
        $team = $request->getTeam();
        
        // Verify current user is team manager using TeamManagerCheckerController
        if (!$teamManagerChecker->isTeamManager($team, $currentUser)) {
            return $this->json(['error' => 'Unauthorized - You are not the team manager'], 403);
        }
        
        $request->setStatus('rejected');
        $request->setProccedAt(new \DateTime());
        $em->flush();
        
        // Notify player
        $update = new Update(
            ['/user/'.$request->getPlayer()->getId().'/notifications'],
            json_encode([
                'type' => 'team_join_rejected',
                'message' => 'Your request to join '.$team->getNom().' has been rejected',
                'teamId' => $team->getId()  // Added teamId for consistency with accept
            ])
        );
        $hub->publish($update);
        
        return $this->json(['success' => true]);
    }
}
