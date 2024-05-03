<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class TvStationsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_tv_stations()
    {
        $url = FootballApi::tvStations()->all()->url->getPath();
        $this->assertEquals('/v3/football/tv-stations', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_tv_station()
    {
        $id = 33;
        $url = FootballApi::tvStations()->byId($id)->url->getPath();
        $this->assertEquals("/v3/football/tv-stations/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_tv_stations_by_fixture_id()
    {
        $fixtureId = 16808591;
        $url = FootballApi::tvStations()->byFixtureId($fixtureId)->url->getPath();
        $this->assertEquals("/v3/football/tv-stations/fixtures/$fixtureId", $url);
    }
}
