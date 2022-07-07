<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * The TV stations' endpoint is about TV Stations broadcasting football fixtures.
 * The TV Stations endpoint returns all TV Stations that broadcast the requested fixture.
 * You can find the details on the TV Stations endpoint, including base URL, parameters, includes, and more.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/tv-stations
 */
class TvStation extends FootballApiClient
{
    /**
     * Returns all the TV Stations available for your requested fixture ID.
     *
     * @see     Fixture::tvStations()
     * @param   int     $fixtureId  the fixture id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byFixture(int $fixtureId, array $params = []): object
    {
        return (new Fixture($fixtureId))->tvStations($params);
    }
}
