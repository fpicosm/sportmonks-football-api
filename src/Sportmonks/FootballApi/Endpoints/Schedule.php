<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/schedules
 */
class Schedule extends FootballApiClient
{
    /**
     * Returns the complete season schedule from your requested season ID.
     *
     * @see     Season::schedules()
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function bySeason(int $seasonId, array $params = []): object
    {
        return $this->call("schedules/seasons/$seasonId", $params);
    }

    /**
     * Returns the complete season schedule for one specific team from your requested season ID.
     *
     * @param   int     $seasonId   the season id
     * @param   int     $teamId     the team id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function bySeasonAndTeam(int $seasonId, int $teamId, array $params = []): object
    {
        return $this->call("schedules/seasons/$seasonId/teams/$teamId", $params);
    }
}
