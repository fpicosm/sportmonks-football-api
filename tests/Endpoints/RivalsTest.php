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
    public function it_returns_all_rivals ()
    {
        $url = FootballApi::rivals()->all()->url->getPath();
        $this->assertEquals('/v3/football/rivals', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_rivals_by_team_id ()
    {
        $teamId = 53;
        $url = FootballApi::rivals()->byTeamId($teamId)->url->getPath();
        $this->assertEquals("/v3/football/rivals/teams/$teamId", $url);
    }
}
