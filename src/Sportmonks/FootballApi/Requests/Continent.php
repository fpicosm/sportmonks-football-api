<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class Continent extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all(string|array $include = ''): object
    {
        return $this->call($this->core, 'continents', $include);
    }

    /**
     * @throws GuzzleException
     */
    public function byId(int $id, string|array $include = ''): object
    {
        return $this->call($this->core, "continents/${id}", $include);
    }
}
