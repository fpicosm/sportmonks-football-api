<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Venues extends FootballClient
{
    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues/get-all-venues Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('venues', $query);
    }

    /**
     * @param  int    $id     the venue id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues/get-venue-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("venues/$id", $query);
    }

    /**
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues/get-venues-by-season-id Docs
     */
    public function bySeasonId (int $seasonId, array $query = []) : object
    {
        return $this->call("venues/seasons/$seasonId", $query);
    }

    /**
     * @param  string  $name   the venue name to search
     * @param  array   $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues/get-venues-by-search-by-name Docs
     */
    public function search (string $name, array $query = []) : object
    {
        return $this->call("venues/search/$name", $query);
    }
}
