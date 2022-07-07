<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * Retrieve historical squads via our Teams Squad endpoint.
 * You can retrieve historical squads from 2005 and onwards.
 * The endpoint also includes player performances in the requested season.*
 * You can find the details on the Team Squads endpoint, including base URL, parameters, includes, and more.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads
 */
class TeamSquad extends FootballApiClient
{
    /**
     * Returns the current domestic squad from your requested team ID
     *
     * @see     Team::squad()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads/get-team-squads-by-team-id
     * @param   int     $teamId a valid team id from the teams endpoint
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byTeam(int $teamId, array $params = []): object
    {
        return (new Team($teamId))->squad($params);
    }

    /**
     * Returns (historical) squads from your requested season ID.
     *
     * @see     Season::teamSquad()
     * @param   int     $teamId     a valid team id from the teams endpoint
     * @param   int     $seasonId   a valid season id from the seasons endpoint
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byTeamAndSeason(int $teamId, int $seasonId, array $params = []): object
    {
        return (new Season($seasonId))->teamSquad($teamId, $params);
    }
}
