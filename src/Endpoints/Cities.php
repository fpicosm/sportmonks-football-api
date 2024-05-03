<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\CoreClient;

class Cities extends CoreClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/cities/get-all-cities Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('cities', $query);
    }

    /**
     * @param int $id the city id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/cities/get-city-by-id Docs
     */
    public function byId(int $id, array $query = []): object
    {
        return $this->call("cities/$id", $query);
    }

    /**
     * @param string $name the city name
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/cities/get-cities-by-search Docs
     */
    public function search(string $name, array $query = []): object
    {
        return $this->call("cities/search/$name", $query);
    }
}
