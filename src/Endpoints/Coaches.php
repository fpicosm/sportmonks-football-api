<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class Coaches extends FootballApiClient
{
    /**
     * @return object the response object
     *
     * @param  int    $id     the coach id
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function find (int $id, array $query = []) : object
    {
        return $this->call("coaches/$id", $query);
    }
}
