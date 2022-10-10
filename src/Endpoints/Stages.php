<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class Stages extends FootballApiClient
{
    /**
     * @return object the response object
     *
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     *
     * @throws GuzzleException
     */
    public function bySeason (int $seasonId, array $query = []) : object
    {
        return (new Seasons($seasonId))->stages($query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $id     the stage id
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function find (int $id, array $query = []) : object
    {
        return $this->call("stages/$id", $query);
    }
}
