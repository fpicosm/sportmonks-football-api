<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Livescores extends FootballClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/livescores/get-inplay-livescores Docs
     */
    public function inplay(array $query = []): object
    {
        return $this->call('livescores/inplay', $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/livescores/get-all-livescores Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('livescores', $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/livescores/get-latest-updated-livescores Docs
     */
    public function lastUpdated(array $query = []): object
    {
        return $this->call('livescores/latest', $query);
    }
}
