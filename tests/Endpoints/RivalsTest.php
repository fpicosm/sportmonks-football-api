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
    public function it_returns_all_rivals()
    {
        $response = FootballApi::rivals()->all();
        $this->assertEquals('/v3/football/rivals', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_rivals_by_team_id()
    {
        $teamId = 1;

        $response = FootballApi::rivals()->byTeam($teamId);
        $this->assertEquals("/v3/football/rivals/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
