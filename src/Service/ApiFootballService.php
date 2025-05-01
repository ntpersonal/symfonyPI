<?php
// src/Service/ApiFootballService.php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiFootballService
{
    private const BASE = 'https://apiv3.apifootball.com/';
    private $httpClient;
    private $apiHost = 'https://apiv3.apifootball.com';
    private $certPath = 'C:/xampp4/php/extras/ssl/cacert.pem';

    public function __construct(
        private HttpClientInterface $client,
        private string              $apiKey
        
    ) {
        $this->ensureCertificateExists();
        
        $this->httpClient = \Symfony\Component\HttpClient\HttpClient::create([
            'verify_peer' => true,
            'verify_host' => true,
            'cafile' => $this->certPath,
            'timeout' => 30
        ]);
    }

    private function call(array $query): array
    {
        $query['APIkey'] = $this->apiKey;
        $response = $this->client->request('GET', self::BASE, [
            'query' => $query,
        ]);

        return $response->toArray(false) ?: [];
    }

    /**
     * List all leagues for a specific season.
     */
    public function getLeagues(int $season = null, int $countryId = null): array
    {
        $q = ['action'=>'get_leagues'];
        if ($season)    $q['season']     = $season;
        if ($countryId) $q['country_id'] = $countryId;
        return $this->call($q);
    }

    /**
     * Fetch one league (or cup) by its ID + season.
     */
    public function getLeagueBySeason(int $leagueId, int $season): array
    {
        $resp = $this->call([
            'action'    => 'get_leagues',
            'league_id' => $leagueId,
            'season'    => $season,
        ]);
        return $resp[0] ?? [];
    }

    /**
     * GET /?action=get_events&league_id={id}&season={year/year+1}
     */
    public function getFixturesByLeagueAndSeason(int $leagueId, int $seasonStart): array
    {
        // build "2024/2025" from 2024
        $season = sprintf('%d/%d', $seasonStart, $seasonStart + 1);

        return $this->call([
            'action'    => 'get_events',
            'league_id' => $leagueId,
            'season'    => $season,
        ]);
    }
    public function getEvents(int $leagueId, int $season): array
    {
        $from = sprintf('%d-03-01', $season + 1);
        $to   = sprintf('%d-12-30', $season + 1);
        // calls ?action=get_events&league_id=…&season=…
        return $this->call([
            'action'    => 'get_events',
            'league_id' => $leagueId,
            'from'      => $from,
            'to'        => $to,
            'season'    => $season,
        ]);
    }
      /**
 * GET /?action=get_events&season={year}&from={YYYY-MM-DD}&to={YYYY-MM-DD}
 *
 * Fetch *all* matches in a given season, regardless of league.
 *
 * @param int $seasonStart Four-digit year, e.g. 2024
 * @return array<int,array>  List of event maps
 */
public function getEventsMatches(int $seasonStart): array
{
    // build your date-range if you like – this is optional,
    // but keeps you within the season boundaries:
    $from = sprintf('%d-03-01', $seasonStart + 1);
    $to   = sprintf('%d-12-30', $seasonStart + 1);

    return $this->call([
        'action' => 'get_events',
        'season' => $seasonStart,
        'from'   => $from,
        'to'     => $to,
    ]);
}
public function getEventById(int $matchId): array
{
    $resp = $this->call([
        'action'   => 'get_events',
        'match_id' => $matchId,
    ]);

    return $resp[0] ?? [];
}

public function getTeamById(int $teamId): array
{
    $resp = $this->call([
        'action'  => 'get_teams',
        'team_id' => $teamId,
    ]);

    return $resp[0] ?? [];
}

// 1. Count how many times two teams have played in a season (all matches)
public function countHeadToHeadMatches(string $teamA, string $teamB, int $seasonStart): int
{
    $matches = $this->getEventsMatches($seasonStart);
    return $this->countMatchesBetweenTeams($matches, $teamA, $teamB);
}

// 2. Count how many times two teams have played in a specific league/tournament
public function countHeadToHeadMatchesInLeague(string $teamA, string $teamB, int $leagueId, int $seasonStart): int
{
    $matches = $this->getFixturesByLeagueAndSeason($leagueId, $seasonStart);
    return $this->countMatchesBetweenTeams($matches, $teamA, $teamB);
}

// PRIVATE helper to avoid repeating
private function countMatchesBetweenTeams(array $matches, string $teamA, string $teamB): int
{
    $count = 0;
    $teamA = strtolower($teamA);
    $teamB = strtolower($teamB);

    foreach ($matches as $match) {
        $home = strtolower($match['match_hometeam_name']);
        $away = strtolower($match['match_awayteam_name']);

        if (
            ($home === $teamA && $away === $teamB) ||
            ($home === $teamB && $away === $teamA)
        ) {
            $count++;
        }
    }

    return $count;
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
