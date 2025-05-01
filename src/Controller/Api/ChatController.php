<?php

namespace App\Controller\Api;

use App\Service\ChatService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ChatController
{
    public function __construct(private ChatService $chatService) {}

    #[Route('/api/chat', name: 'api_chat', methods: ['POST'])]
    public function chat(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $message = $data['message'] ?? '';
        $contextType = $data['contextType'] ?? '';
        $contextData = $data['contextData'] ?? [];

        // Build context-aware prompt
        $prompt = $message;

        switch ($contextType) {
            case 'local_match':
                $prompt .= sprintf(
                    "\nContext: Local match between %s and %s on %s. Tournament: %s, Status: %s",
                    $contextData['teamA'], $contextData['teamB'], $contextData['date'],
                    $contextData['tournament'] ?? 'N/A', $contextData['status']
                );
                break;

            case 'api_match':
                $prompt .= sprintf(
                    "\nContext: International match between %s and %s on %s. League: %s, Status: %s",
                    $contextData['teamA'], $contextData['teamB'], $contextData['date'],
                    $contextData['league'], $contextData['status']
                );
                break;

            case 'tournoi':
                $prompt .= sprintf(
                    "\nContext: Tournament details: %s from %s to %s, Status: %s, Teams: %d",
                    $contextData['nom'], $contextData['startDate'], $contextData['endDate'],
                    $contextData['status'], $contextData['nbEquipe']
                );
                break;
        }

        // Now send the full prompt
        $response = $this->chatService->ask($prompt);

        return new JsonResponse(['reply' => $response]);
    }
}
