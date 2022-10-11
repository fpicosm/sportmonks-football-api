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
    public function it_returns_a_stage ()
    {
        $data = FootballApi::stages()->find(77458033)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);

        $this->assertEquals("Regular Season", $data->name);
    }
}
