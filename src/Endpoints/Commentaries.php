<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Commentaries extends FootballClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/commentaries/get-all-commentaries Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('commentaries', $query);
    }

    /**
     * @param int $fixtureId the fixture id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/commentaries/get-commentaries-by-fixture-id Docs
     */
    public function byFixture(int $fixtureId, array $query = []): object
    {
        return $this->call("commentaries/fixtures/$fixtureId", $query);
    }
}
