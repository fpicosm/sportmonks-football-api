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
    public function it_returns_tv_stations_by_fixture ()
    {
        $data = FootballApi::tvStations()->byFixture(16924614)->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
        $this->assertEquals('CANAL+ Sport (Fra)', $data[0]->tvstation);
    }
}
