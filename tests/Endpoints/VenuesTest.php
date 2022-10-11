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
    public function it_returns_a_venue ()
    {
        $data = FootballApi::venues()->find(9239)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);

        $this->assertEquals('Estadio de Balaídos', $data->name);
    }
}
