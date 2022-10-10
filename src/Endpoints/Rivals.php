<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class Rivals extends FootballApiClient
{
    /**
     * @return object the response object
     *
     * @param  int    $teamId  the team id
     * @param  array  $query   the query params
     *
     * @throws GuzzleException
     */
    public function byTeam (int $teamId, array $query = []) : object
    {
        return (new Teams($teamId))->rivals($query);
    }
}
