<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class RivalsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_team_rivals ()
    {
        $data = FootballApi::rivals()->byTeam(83)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);

        $this->assertEquals("FC Barcelona", $data->name);
        $this->assertObjectHasAttribute('rivals', $data);

        $this->assertNotEmpty($data->rivals->data);
        $this->assertIsArray($data->rivals->data);
    }
}
