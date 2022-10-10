<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class Commentaries extends FootballApiClient
{
    /**
     * @return object the response object
     *
     * @param  int    $fixtureId  the fixture id
     * @param  array  $query      the query params
     *
     * @throws GuzzleException
     */
    public function byFixture (int $fixtureId, array $query = []) : object
    {
        return (new Fixtures($fixtureId))->commentaries($query);
    }
}
