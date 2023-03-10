<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Teams extends FootballClient
{
    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-all-teams Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('teams', $query);
    }

    /**
     * @param  int    $id     the team id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-team-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("teams/$id", $query);
    }

    /**
     * @param  int    $countryId  the country id
     * @param  array  $query      the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-country-id Docs
     */
    public function byCountryId (int $countryId, array $query = []) : object
    {
        return $this->call("teams/countries/$countryId", $query);
    }
}