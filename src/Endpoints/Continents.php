<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\CoreClient;

class Continents extends CoreClient
{
    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/continents/get-all-continents Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('continents', $query);
    }

    /**
     * @param  int    $id     the continent id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/continents/get-continent-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("continents/$id", $query);
    }
}
