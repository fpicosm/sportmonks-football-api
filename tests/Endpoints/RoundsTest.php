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
    public function it_returns_a_round ()
    {
        $data = FootballApi::rounds()->find(275883)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);

        $this->assertEquals(1, $data->name);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_round_standings ()
    {
        $data = FootballApi::rounds(275883)->standings(19799)->data;

        $this->assertIsArray($data);
        $this->assertCount(20, $data);
        $this->assertIsObject($data[0]);
        $this->assertObjectHasAttribute('position', $data[0]);
        $this->assertObjectHasAttribute('overall', $data[0]);
    }

}
