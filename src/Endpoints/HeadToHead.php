<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class HeadToHead extends FootballApiClient
{
    /**
     * @return object the response object
     *
     * @param  int    $firstTeamId   the first team id
     * @param  int    $secondTeamId  the second team id
     * @param  array  $query         the query params
     *
     * @throws GuzzleException
     */
    public function byTeams (int   $firstTeamId,
                             int   $secondTeamId,
                             array $query = []) : object
    {
        return (new Teams($firstTeamId))->headToHead($secondTeamId, $query);
    }
}
