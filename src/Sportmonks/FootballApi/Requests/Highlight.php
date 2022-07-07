<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class Highlight extends FootballApiClient
{
    /**
     * Returns video highlights, goals, events etc.
     *
     * @see     Fixture::highlights()
     * @param   int     $fixtureId  the fixture id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byFixture(int $fixtureId, array $params = []): object
    {
        return $this->call("highlights/fixtures/$fixtureId", $params);
    }
}
