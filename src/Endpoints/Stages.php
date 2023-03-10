<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Stages extends FootballClient
{
    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-all-stages Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('stages', $query);
    }

    /**
     * @param  int    $id     the stage id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stage-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("stages/$id", $query);
    }

    /**
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stages-by-season-id Docs
     */
    public function bySeasonId (int $seasonId, array $query = []) : object
    {
        return $this->call("stages/seasons/$seasonId", $query);
    }

    /**
     * @param  string  $name   the stage name
     * @param  array   $query  the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stages-by-search-by-name Docs
     */
    public function search (string $name, array $query = []) : object
    {
        return $this->call("stages/search/$name", $query);
    }
}