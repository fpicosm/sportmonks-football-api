<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Rounds extends FootballClient
{
    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-all-rounds Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('rounds', $query);
    }

    /**
     * @param  int    $id     the round id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-round-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("rounds/$id", $query);
    }

    /**
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-rounds-by-season-id Docs
     */
    public function bySeasonId (int $seasonId, array $query = []) : object
    {
        return $this->call("rounds/seasons/$seasonId", $query);
    }

    /**
     * @param  string  $name   the round name
     * @param  array   $query  the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-rounds-by-search-by-name Docs
     */
    public function search (string $name, array $query = []) : object
    {
        return $this->call("rounds/search/$name", $query);
    }
}