<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\MyClient;

class Filters extends MyClient
{
    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/filters/get-all-entity-filters Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('filters/entity', $query);
    }
}