<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Schedules extends FootballClient
{
    /**
     * @param int $seasonId the season id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id Docs
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->call("schedules/seasons/$seasonId", $query);
    }

    /**
     * @param int $teamId the team id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-team-id Docs
     */
    public function byTeam(int $teamId, array $query = []): object
    {
        return $this->call("schedules/teams/$teamId", $query);
    }

    /**
     * @param int $seasonId the season id
     * @param int $teamId the team id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id-and-team-id Docs
     */
    public function bySeasonAndTeam(int $seasonId, int $teamId, array $query = []): object
    {
        return $this->call("schedules/seasons/$seasonId/teams/$teamId", $query);
    }
}
