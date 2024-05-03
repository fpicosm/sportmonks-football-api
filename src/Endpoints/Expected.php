<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Expected extends FootballClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/expected/get-expected-by-team Docs
     */
    public function byTeam(array $query = []): object
    {
        return $this->call('expected/fixtures', $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/expected/get-expected-by-player Docs
     */
    public function byPlayer(array $query = []): object
    {
        return $this->call('expected/lineups', $query);
    }
}
