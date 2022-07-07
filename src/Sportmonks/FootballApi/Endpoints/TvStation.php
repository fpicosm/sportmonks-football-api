<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/tv-stations
 */
class TvStation extends FootballApiClient
{
    /**
     * Returns all the TV Stations available for your requested fixture ID.
     *
     * @param   int     $fixtureId  the fixture id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byFixture(int $fixtureId, array $params = []): object
    {
        return $this->call("tv-stations/fixtures/$fixtureId", $params);
    }
}
