<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class SchedulesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_schedules_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::schedules()->bySeasonId($seasonId)->url->getPath();
        $this->assertEquals("/v3/football/schedules/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_schedules_by_team_id ()
    {
        $teamId = 282;
        $url = FootballApi::schedules()->byTeamId($teamId)->url->getPath();
        $this->assertEquals("/v3/football/schedules/teams/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_schedules_by_season_and_team_id ()
    {
        $seasonId = 19686;
        $teamId = 282;
        $url = FootballApi::schedules()->bySeasonAndTeamId($seasonId, $teamId)->url->getPath();
        $this->assertEquals("/v3/football/schedules/seasons/$seasonId/teams/$teamId", $url);
    }
}