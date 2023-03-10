<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class Squads extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_squads_by_team_id ()
    {
        $teamId = 282;
        $url = FootballApi::squads()->byTeamId($teamId)->url->getPath();
        $this->assertEquals("/v3/football/squads/teams/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_squads_by_season_and_team_id ()
    {
        $seasonId = 19686;
        $teamId = 282;
        $url = FootballApi::squads()->byTeamAndSeasonId($teamId, $seasonId)->url->getPath();
        $this->assertEquals("/v3/football/squads/seasons/$seasonId/teams/$teamId", $url);
    }
}
