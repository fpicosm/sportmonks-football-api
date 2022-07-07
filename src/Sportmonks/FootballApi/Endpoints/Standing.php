<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings
 */
class Standing extends FootballApiClient
{
    /**
     * Returns all the standings available within your subscription.
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('standings', $params);
    }

    /**
     * Returns the full league standing table from your requested season ID.
     *
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function bySeason(int $seasonId, array $params = []): object
    {
        return $this->call("standings/seasons/$seasonId", $params);
    }

    /**
     * Returns the full league standing table from your requested round ID.
     *
     * @param   int     $roundId    the round id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byRound(int $roundId, array $params = []): object
    {
        return $this->call("standings/rounds/$roundId", $params);
    }

    /**
     * Returns the standing corrections from your requested season ID.
     *
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function correctionsBySeason(int $seasonId, array $params = []): object
    {
        return $this->call("standings/corrections/seasons/$seasonId", $params);
    }
}
