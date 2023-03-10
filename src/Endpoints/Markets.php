<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Markets extends FootballClient
{
    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/markets/get-all-markets Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('markets', $query);
    }

    /**
     * @param  int    $id     the market id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/markets/get-market-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("markets/$id", $query);
    }

    /**
     * @param  string  $name   the market name to search
     * @param  array   $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/markets/get-markets-by-search-by-name Docs
     */
    public function search (string $name, array $query = []) : object
    {
        return $this->call("markets/search/$name", $query);
    }
}