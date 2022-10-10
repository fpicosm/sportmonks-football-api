<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class StagesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_stages ()
    {
        $data = FootballApi::stages()->bySeason(19799)->data;

        $this->assertIsArray($data);
        $this->assertCount(1, $data);
        $this->assertEquals("Regular Season", $data[0]->name);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_stage ()
    {
        $data = FootballApi::stages()->find(77458033)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);

        $this->assertEquals("Regular Season", $data->name);
    }
}
