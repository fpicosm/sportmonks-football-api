<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class TvStations extends FootballClient
{
    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations/get-all-tv-stations Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('tv-stations', $query);
    }

    /**
     * @param  int    $id     the tv-station id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations/get-tv-station-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("tv-stations/$id", $query);
    }

    /**
     * @param  int    $fixtureId  the fixture id
     * @param  array  $query      the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations/get-tv-stations-by-fixture-id Docs
     */
    public function byFixtureId (int $fixtureId, array $query = []) : object
    {
        return $this->call("tv-stations/fixtures/$fixtureId", $query);
    }
}