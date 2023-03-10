<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Schedules extends FootballClient
{
    /**
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id Docs
     */
    public function bySeasonId (int $seasonId, array $query = []) : object
    {
        return $this->call("schedules/seasons/$seasonId", $query);
    }

    /**
     * @param  int    $teamId  the team id
     * @param  array  $query   the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-team-id Docs
     */
    public function byTeamId (int $teamId, array $query = []) : object
    {
        return $this->call("schedules/teams/$teamId", $query);
    }

    /**
     * @param  int    $seasonId  the season id
     * @param  int    $teamId    the team id
     * @param  array  $query     the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id-and-team-id Docs
     */
    public function bySeasonAndTeamId (int $seasonId, int $teamId, array $query = []) : object
    {
        return $this->call("schedules/seasons/$seasonId/teams/$teamId", $query);
    }
}