<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Coaches extends FootballClient
{
    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-all-coaches Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('coaches', $query);
    }

    /**
     * @param  int    $id     the coach id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-coach-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("coaches/$id", $query);
    }

    /**
     * @param  int    $countryId  the country id
     * @param  array  $query      the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-coaches-by-country-id Docs
     */
    public function byCountryId (int $countryId, array $query = []) : object
    {
        return $this->call("coaches/countries/$countryId", $query);
    }

    /**
     * @param  string  $name   the coach name to search
     * @param  array   $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-coaches-by-search-by-name Docs
     */
    public function search (string $name, array $query = []) : object
    {
        return $this->call("coaches/search/$name", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-last-updated-coaches Docs
     */
    public function latest (array $query = []) : object
    {
        return $this->call('coaches/latest', $query);
    }
}
