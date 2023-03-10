<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Players extends FootballClient
{
    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-all-players Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('players', $query);
    }

    /**
     * @param  int    $id     the player id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-player-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("players/$id", $query);
    }

    /**
     * @param  int    $countryId  the country id
     * @param  array  $query      the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-players-by-country-id Docs
     */
    public function byCountryId (int $countryId, array $query = []) : object
    {
        return $this->call("players/countries/$countryId", $query);
    }

    /**
     * @param  string  $name   the player name to search
     * @param  array   $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-players-by-search-by-name Docs
     */
    public function search (string $name, array $query = []) : object
    {
        return $this->call("players/search/$name", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-last-updated-players Docs
     */
    public function latest (array $query = []) : object
    {
        return $this->call('players/latest', $query);
    }
}