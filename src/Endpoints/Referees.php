<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Referees extends FootballClient
{
    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-all-referees Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('referees', $query);
    }

    /**
     * @param  int    $id     the referee id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referee-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("referees/$id", $query);
    }

    /**
     * @param  int    $countryId  the country id
     * @param  array  $query      the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referees-by-country-id Docs
     */
    public function byCountryId (int $countryId, array $query = []) : object
    {
        return $this->call("referees/countries/$countryId", $query);
    }

    /**
     * @param  string  $name   the referee name to search
     * @param  array   $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referees-by-search-by-name Docs
     */
    public function search (string $name, array $query = []) : object
    {
        return $this->call("referees/search/$name", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-last-updated-referees Docs
     */
    public function latest (array $query = []) : object
    {
        return $this->call('referees/latest', $query);
    }
}
