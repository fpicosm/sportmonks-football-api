<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/video-highlights
 */
class Highlight extends FootballApiClient
{
    /**
     * Returns video highlights, goals, events etc.
     *
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
