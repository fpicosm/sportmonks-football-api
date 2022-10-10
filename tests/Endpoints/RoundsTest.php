<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class RoundsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_rounds ()
    {
        $data = FootballApi::rounds()->bySeason(19799)->data;

        $this->assertIsArray($data);
        $this->assertCount(38, $data);
        $this->assertEquals(1, $data[0]->name);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_round ()
    {
        $data = FootballApi::rounds()->find(275883)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);

        $this->assertEquals(1, $data->name);
    }
}
