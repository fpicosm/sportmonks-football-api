<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\CoreClient;

class Regions extends CoreClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/regions/get-all-regions Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('regions', $query);
    }

    /**
     * @param int $id the region id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/regions/get-region-by-id Docs
     */
    public function byId(int $id, array $query = []): object
    {
        return $this->call("regions/$id", $query);
    }

    /**
     * @param string $name the region name
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/regions/get-regions-by-search Docs
     */
    public function search(string $name, array $query = []): object
    {
        return $this->call("regions/search/$name", $query);
    }
}
