<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class States extends FootballClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/states/get-all-states Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('states', $query);
    }

    /**
     * @param int $id the state id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/states/get-state-by-id Docs
     */
    public function find(int $id, array $query = []): object
    {
        return $this->call("states/$id", $query);
    }
}
