<?php
// src/Service/ApiFootballService.php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiFootballService
{
    private const BASE = 'https://apiv3.apifootball.com/';

    public function __construct(
        private HttpClientInterface $client,
        private string              $apiKey
    ) {}

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

}
