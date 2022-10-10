<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class Livescores extends FootballApiClient
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
        return $this->call('livescores', $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function live (array $query = []) : object
    {
        return $this->call('livescores/now', $query);
    }
}
