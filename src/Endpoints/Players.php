<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class Players extends FootballApiClient
{
    /**
     * @return object the response object
     *
     * @param  int    $id     the player id
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function find (int $id, array $query = []) : object
    {
        return $this->call("players/$id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  string  $name   the player name to search
     * @param  array   $query  the query params
     *
     * @throws GuzzleException
     */
    public function search (string $name, array $query = []) : object
    {
        return $this->call("players/search/$name", $query);
    }
}
