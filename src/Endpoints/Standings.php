<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Standings extends FootballClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-all-standings Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('standings', $query);
    }

    /**
     * @param int $seasonId the season id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standings-by-season-id Docs
     */
    public function bySeasonId(int $seasonId, array $query = []): object
    {
        return $this->call("standings/seasons/$seasonId", $query);
    }

    /**
     * @param int $roundId the round id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standings-by-round-id Docs
     */
    public function byRoundId(int $roundId, array $query = []): object
    {
        return $this->call("standings/rounds/$roundId", $query);
    }

    /**
     * @param int $seasonId the season id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standing-correction-by-season-id Docs
     */
    public function correctionBySeasonId(int $seasonId, array $query = []): object
    {
        return $this->call("standings/corrections/seasons/$seasonId", $query);
    }

    /**
     * @param int $leagueId the league id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-live-standings-by-league-id Docs
     */
    public function liveByLeagueId(int $leagueId, array $query = []): object
    {
        return $this->call("standings/live/leagues/$leagueId", $query);
    }
}
