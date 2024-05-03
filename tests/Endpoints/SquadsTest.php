<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class SquadsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_squads_by_team_id()
    {
        $teamId = 1;

        $response = FootballApi::squads()->byTeam($teamId);
        $this->assertEquals("/v3/football/squads/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_squads_by_season_and_team_id()
    {
        $seasonId = 21646;
        $teamId = 1;

        $response = FootballApi::squads()->byTeamAndSeason($teamId, $seasonId);
        $this->assertEquals("/v3/football/squads/seasons/$seasonId/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
