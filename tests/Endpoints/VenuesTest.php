<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class VenuesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_venues ()
    {
        $data = FootballApi::venues()->bySeason(19799)->data;

        $this->assertIsArray($data);
        $this->assertCount(20, $data);
        $this->assertIsObject($data[0]);
        $this->assertEquals('Estadio de Balaídos', $data[0]->name);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_venue ()
    {
        $data = FootballApi::venues()->find(9239)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);

        $this->assertEquals('Estadio de Balaídos', $data->name);
    }
}
