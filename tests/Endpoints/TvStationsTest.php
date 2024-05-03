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
        $response = FootballApi::tvStations()->all();
        $this->assertEquals('/v3/football/tv-stations', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_tv_station()
    {
        $id = 33;

        $response = FootballApi::tvStations()->find($id);
        $this->assertEquals("/v3/football/tv-stations/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_tv_stations_by_fixture_id()
    {
        $fixtureId = 16808591;

        $response = FootballApi::tvStations()->byFixture($fixtureId);
        $this->assertEquals("/v3/football/tv-stations/fixtures/$fixtureId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
