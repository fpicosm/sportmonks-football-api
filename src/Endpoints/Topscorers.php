<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class Topscorers extends FootballApiClient
{
    /**
     * @return object the response object
     *
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     *
     * @throws GuzzleException
     */
    public function bySeason (int $seasonId, array $query = []) : object
    {
        return (new Seasons($seasonId))->topscorers(false, $query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     *
     * @throws GuzzleException
     */
    public function aggregatedBySeason (int $seasonId, array $query = []) : object
    {
        return (new Seasons($seasonId))->topscorers(true, $query);
    }
}
