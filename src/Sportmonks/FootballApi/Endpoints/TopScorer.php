<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/topscorers
 */
class TopScorer extends FootballApiClient
{
    /**
     * Returns all the topscorers per stage of the requested season.
     *
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function bySeason(int $seasonId, array $params = []): object
    {
        return $this->call("topscorers/seasons/$seasonId", $params);
    }

    /**
     * Returns all the aggregated topscorers of the requested season.
     *
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function aggregatedBySeason(int $seasonId, array $params = []): object
    {
        return $this->call("topscorers/seasons/$seasonId/aggregated", $params);
    }
}
