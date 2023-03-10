<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\OddsClient;

class Bookmakers extends OddsClient
{
    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-all-bookmakers Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('bookmakers', $query);
    }

    /**
     * @param  int    $id     the bookmaker id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("bookmakers/$id", $query);
    }

    /**
     * @param  string  $name   the bookmaker name to search
     * @param  array   $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-bookmakers-by-search-by-name Docs
     */
    public function search (string $name, array $query = []) : object
    {
        return $this->call("bookmakers/search/$name", $query);
    }

    /**
     * @param  int    $fixtureId  the fixture id
     * @param  array  $query      the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-fixture-id Docs
     */
    public function byFixtureId (int $fixtureId, array $query = []) : object
    {
        return $this->call("bookmakers/fixtures/$fixtureId", $query);
    }
}