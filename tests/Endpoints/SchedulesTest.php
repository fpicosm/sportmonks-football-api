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
    public function it_returns_all_schedules_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::schedules()->bySeason($seasonId);
        $this->assertEquals("/v3/football/schedules/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_schedules_by_team_id()
    {
        $teamId = 1;

        $response = FootballApi::schedules()->byTeam($teamId);
        $this->assertEquals("/v3/football/schedules/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_schedules_by_season_and_team_id()
    {
        $seasonId = 21646;
        $teamId = 1;

        $response = FootballApi::schedules()->bySeasonAndTeam($seasonId, $teamId);
        $this->assertEquals("/v3/football/schedules/seasons/$seasonId/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
