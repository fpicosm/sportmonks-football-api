<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class Leagues extends FootballApiClient
{
    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function all (array $query = []) : object
    {
        return $this->call('leagues', $query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $id     the league id
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function find (int $id, array $query = []) : object
    {
        return $this->call("leagues/$id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  string  $name   the league name
     * @param  array   $query  the query params
     *
     * @throws GuzzleException
     */
    public function search (string $name, array $query = []) : object
    {
        return $this->call("leagues/search/$name", $query);
    }
}
