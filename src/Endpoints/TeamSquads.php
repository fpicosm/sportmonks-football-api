<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class TeamSquads extends FootballApiClient
{
    /**
     * @return object the response object
     *
     * @param  int    $seasonId  the season id
     * @param  int    $teamId    the team id
     * @param  array  $query     the query params
     *
     * @throws GuzzleException
     * @see Seasons::squad()
     */
    public function bySeasonAndTeam (int $seasonId, int $teamId, array $query = []) : object
    {
        return (new Seasons($seasonId))->squad($teamId, $query);
    }
}
