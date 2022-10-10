<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class Bookmakers extends FootballApiClient
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
        return $this->call('bookmakers', $query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $fixtureId  the fixture id
     * @param  array  $query      the query params
     *
     * @throws GuzzleException
     * @see Fixtures::bookmakers()
     */
    public function byFixture (int $fixtureId, array $query = []) : object
    {
        return (new Fixtures($fixtureId))->bookmakers($query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $id     the bookmaker id
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function find (int $id, array $query = []) : object
    {
        return $this->call("bookmakers/$id", $query);
    }
}
