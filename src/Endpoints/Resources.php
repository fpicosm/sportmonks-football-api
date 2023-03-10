<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\MyClient;

class Resources extends MyClient
{
    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/my-sportmonks/get-my-resources Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('resources', $query);
    }
}
