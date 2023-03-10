<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\CoreClient;

class Countries extends CoreClient
{
    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/countries/get-all-countries Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('countries', $query);
    }

    /**
     * @param  int    $id     the country id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/countries/get-country-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("countries/$id", $query);
    }

    /**
     * @param  string  $name   the country name
     * @param  array   $query  the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/countries/get-countries-by-search Docs
     */
    public function search (string $name, array $query = []) : object
    {
        return $this->call("countries/search/$name", $query);
    }
}