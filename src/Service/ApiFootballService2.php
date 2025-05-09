<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpClient\HttpClient;

class ApiFootballService2 
{
    private $httpClient;
    private $apiHost = 'https://apiv3.apifootball.com';
    private $apiKey = '16739ae9f2e5652e296f27c46d1375c199bff5ac615755a05fa2f51f540528e4';
    private $certPath = 'C:/xampp4/php/extras/ssl/cacert.pem';
    public function __construct()
    {
        $this->ensureCertificateExists();
        
        $this->httpClient = \Symfony\Component\HttpClient\HttpClient::create([
            'verify_peer' => true,
            'verify_host' => true,
            'cafile' => $this->certPath,
            'timeout' => 30
        ]);
    }
    private function ensureCertificateExists(): void
    {
        // Check if certificate file exists
        if (!file_exists($this->certPath)) {
            // Create directory if it doesn't exist
            $dir = dirname($this->certPath);
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            
            // Download fresh certificate bundle
            $certData = file_get_contents('https://curl.haxx.se/ca/cacert.pem');
            if ($certData === false) {
                throw new \RuntimeException('Failed to download certificate bundle');
            }
            
            // Save to file
            if (file_put_contents($this->certPath, $certData) === false) {
                throw new \RuntimeException('Failed to save certificate file');
            }
        }
        
        // Verify the file is readable
        if (!is_readable($this->certPath)) {
            throw new \RuntimeException('Certificate file is not readable');
        }
    }
    
    public function getTeamsByLeague(int $leagueId): array
    {
        $response = $this->httpClient->request(
            'GET', 
            "{$this->apiHost}/?action=get_teams&league_id={$leagueId}&APIkey={$this->apiKey}"
        );
        
        $this->validateResponse($response);
        $data = $response->toArray();
        
        return array_map(function($teamData) {
            return [
                'id' => $teamData['team_key'],
                'name' => $teamData['team_name'],
                'logo' => $teamData['team_badge'],
                'country' => $teamData['team_country'] ?? null,
                'founded' => $teamData['team_founded'] ?? null
            ];
        }, $data);
    }

    public function getTeamData(int $teamId): ?array
    {
        $response = $this->httpClient->request(
            'GET', 
            "{$this->apiHost}/?action=get_teams&team_id={$teamId}&APIkey={$this->apiKey}"
        );
        
        $this->validateResponse($response);
        $data = $response->toArray();
        
        if (empty($data[0])) {
            return null;
        }
        
        $teamData = $data[0];
        
        // Add player count to the returned data
        $teamData['player_count'] = count($teamData['players'] ?? []);
        
        return $teamData;
    }

    public function getTeamPlayers(int $teamId): array
    {
        $teamData = $this->getTeamData($teamId);
        return $teamData['players'] ?? [];
    }

    public function getTeamFixtures(int $teamId, int $leagueId): array
    {
        $today = date('Y-m-d');
        $nextWeek = date('Y-m-d', strtotime('+7 days'));
        
        $response = $this->httpClient->request(
            'GET', 
            "{$this->apiHost}/?action=get_events&from={$today}&to={$nextWeek}&league_id={$leagueId}&APIkey={$this->apiKey}"
        );
        
        $this->validateResponse($response);
        return $response->toArray();
    }
    public function getTop5Leagues(int $season): array
    {
        $topLeagueIds = [61, 152, 207, 4, 302, 3, 56];
        $uniqueLeagues = [];
    
        try {
            $response = $this->httpClient->request(
                'GET',
                "https://apiv3.apifootball.com/?action=get_leagues&season={$season}&APIkey={$this->apiKey}",
                [
                    'timeout' => 30,
                    'headers' => [
                        'Accept' => 'application/json',
                    ]
                ]
            );
    
            if ($response->getStatusCode() !== 200) {
                throw new \RuntimeException('API returned status code: '.$response->getStatusCode());
            }
    
            $data = $response->toArray();
            $leagues = [];
    
            foreach ($data as $leagueData) {
                if (!isset($leagueData['league_id'], $leagueData['league_name'])) {
                    continue;
                }
    
                $leagueId = (int)$leagueData['league_id'];
                
                if (in_array($leagueId, $topLeagueIds)) {
                    $leagueName = $leagueData['league_name'];
                    
                    if (!isset($uniqueLeagues[$leagueName])) {
                        $leagues[] = [
                            'id' => $leagueId,
                            'name' => $leagueName,
                            'logo' => $leagueData['league_logo'] ?? null,
                            'country' => $leagueData['country_name'] ?? null
                        ];
                        $uniqueLeagues[$leagueName] = true;
                    }
                }
            }
    
            return $leagues;
    
        } catch (\Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface $e) {
            throw new \RuntimeException('Transport error: '.$e->getMessage());
        } catch (\Exception $e) {
            throw new \RuntimeException('API request failed: '.$e->getMessage());
        }
    }
    

    public function getLeagueStandings(int $leagueId): array
    {
        $response = $this->httpClient->request(
            'GET', 
            "{$this->apiHost}/?action=get_standings&league_id={$leagueId}&APIkey={$this->apiKey}"
        );
        
        $this->validateResponse($response);
        return $response->toArray();
    }

    private function validateResponse($response): void
    {
        if ($response->getStatusCode() !== 200) {
            throw new \RuntimeException('API request failed with status code: '.$response->getStatusCode());
        }
        
        $contentType = $response->getHeaders()['content-type'][0] ?? '';
        if (strpos($contentType, 'application/json') === false) {
            throw new \RuntimeException('API returned non-JSON response');
        }
    }
}