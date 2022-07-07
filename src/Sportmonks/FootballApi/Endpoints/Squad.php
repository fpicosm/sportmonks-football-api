<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads
 */
class Squad extends FootballApiClient
{
    /**
     * Returns the current domestic squad from your requested team ID
     *
     * @param   int     $teamId the team id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byTeam(int $teamId, array $params = []): object
    {
        return $this->call("squads/teams/$teamId", $params);
    }

    /**
     * Returns (historical) squads from your requested season ID.
     *
     * @param   int     $teamId     the team id
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byTeamAndSeason(int $teamId, int $seasonId, array $params = []): object
    {
        return $this->call("squads/seasons/$seasonId/teams/$teamId", $params);
    }
}
