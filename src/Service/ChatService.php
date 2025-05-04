<?php

namespace App\Service;

use GeminiAPI\Client;
use GeminiAPI\Resources\ModelName;
use GeminiAPI\Resources\Parts\TextPart;
use App\Repository\MatchesRepository;
use Doctrine\Common\Collections\ArrayCollection;

class ChatService
{
    private Client $client;

    public function __construct(
        string $geminiApiKey,
        private MatchesRepository $matchesRepository,
        private ApiFootballService $apiService
    ) {
        $this->client = new Client($geminiApiKey);
    }

    public function ask(string $prompt): string
    {
        $intent = $this->detectIntent($prompt);

        if ($intent) {
            return $this->handleIntent($intent);
        }

        $response = $this->client
            ->generativeModel(ModelName::GEMINI_1_5_FLASH)
            ->startChat()
            ->sendMessage(new TextPart($prompt));

        return $response->text();
    }

    private function detectIntent(string $message): ?array
    {
        $message = strtolower($message);

        $keywords = [
            'how many times',
            'have played against',
            'head to head',
            'matches between',
            'games between',
            'historic matches',
            'confrontation between',
            'history between',
            'meeting between',
            'encounters between',
        ];

        foreach ($keywords as $keyword) {
            if (strpos($message, $keyword) !== false) {
                // Tournament case
                if (preg_match('/between (.+) and (.+) in (.+)/i', $message, $matches)) {
                    return [
                        'intent' => 'match_history',
                        'teamA' => trim($matches[1]),
                        'teamB' => trim($matches[2]),
                        'tournament' => trim($matches[3]),
                    ];
                }
                if (preg_match('/(.+) have played against (.+) in (.+)/i', $message, $matches)) {
                    return [
                        'intent' => 'match_history',
                        'teamA' => trim($matches[1]),
                        'teamB' => trim($matches[2]),
                        'tournament' => trim($matches[3]),
                    ];
                }
                // Normal case
                if (preg_match('/between (.+) and (.+)/i', $message, $matches)) {
                    return [
                        'intent' => 'match_history',
                        'teamA' => trim($matches[1]),
                        'teamB' => trim($matches[2]),
                        'tournament' => null,
                    ];
                }
                if (preg_match('/(.+) have played against (.+)/i', $message, $matches)) {
                    return [
                        'intent' => 'match_history',
                        'teamA' => trim($matches[1]),
                        'teamB' => trim($matches[2]),
                        'tournament' => null,
                    ];
                }
            }
        }

        return null;
    }

    private function handleIntent(array $intent): string
    {
        if ($intent['intent'] !== 'match_history') {
            return "❓ Sorry, I don't understand your request.";
        }

        $teamA = $intent['teamA'];
        $teamB = $intent['teamB'];
        $tournament = $intent['tournament'] ?? null;

        // Search local matches
        $qb = $this->matchesRepository->createQueryBuilder('m')
            ->join('m.teamA', 'a')
            ->join('m.teamB', 'b')
            ->leftJoin('m.tournoi', 't')
            ->where('LOWER(a.nom) LIKE :teamA AND LOWER(b.nom) LIKE :teamB')
            ->setParameters(new ArrayCollection([
                'teamA' => '%' . strtolower($teamA) . '%',
                'teamB' => '%' . strtolower($teamB) . '%',
            ]));

        if ($tournament) {
            $qb->andWhere('LOWER(t.nom) LIKE :tournament')
               ->setParameter('tournament', '%' . strtolower($tournament) . '%');
        }

        $localMatches = $qb->getQuery()->getResult();
        $localCount = count($localMatches);

        // Search API matches
        $apiCount = 0;
        $currentYear = (int)date('Y');

        for ($year = $currentYear; $year >= 2015; $year--) {
            $events = $this->apiService->getEventsMatches($year);
            foreach ($events as $event) {
                $home = strtolower($event['match_hometeam_name'] ?? '');
                $away = strtolower($event['match_awayteam_name'] ?? '');
                $league = strtolower($event['league_name'] ?? '');

                $teamsMatch = (
                    ($home === strtolower($teamA) && $away === strtolower($teamB)) ||
                    ($home === strtolower($teamB) && $away === strtolower($teamA))
                );

                $leagueMatch = true;
                if ($tournament) {
                    $leagueMatch = stripos($league, strtolower($tournament)) !== false;
                }

                if ($teamsMatch && $leagueMatch) {
                    $apiCount++;
                }
            }
        }

        $total = $localCount + $apiCount;

        return "**$teamA** and **$teamB** have played **$total times" .
               ($tournament ? " in the **$tournament**" : '') .
               "**.\n- Local matches: $localCount\n- External matches (API): $apiCount";
    }
}
