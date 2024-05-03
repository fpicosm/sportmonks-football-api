<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class SeasonsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_seasons()
    {
        $response = FootballApi::seasons()->all();
        $this->assertEquals('/v3/football/seasons', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_season()
    {
        $id = 21646;

        $response = FootballApi::seasons()->find($id);
        $this->assertEquals("/v3/football/seasons/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_seasons_by_team_id()
    {
        $teamId = 1;

        $response = FootballApi::seasons()->byTeam($teamId);
        $this->assertEquals("/v3/football/seasons/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_seasons_search()
    {
        $name = 2024;

        $response = FootballApi::seasons()->search($name);
        $this->assertEquals("/v3/football/seasons/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_schedules_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::seasons($seasonId)->schedules();
        $this->assertEquals("/v3/football/schedules/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_schedules_by_season_and_team_id()
    {
        $seasonId = 21646;
        $teamId = 1;

        $response = FootballApi::seasons($seasonId)->schedulesByTeam($teamId);
        $this->assertEquals("/v3/football/schedules/seasons/$seasonId/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_stages_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::seasons($seasonId)->stages();
        $this->assertEquals("/v3/football/stages/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_rounds_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::seasons($seasonId)->rounds();
        $this->assertEquals("/v3/football/rounds/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_standings_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::seasons($seasonId)->standings();
        $this->assertEquals("/v3/football/standings/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_standings_correction_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::seasons($seasonId)->standingsCorrection();
        $this->assertEquals("/v3/football/standings/corrections/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_topscorers_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::seasons($seasonId)->topscorers();
        $this->assertEquals("/v3/football/topscorers/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_teams_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::seasons($seasonId)->teams();
        $this->assertEquals("/v3/football/teams/seasons/$seasonId", $response->url->getPath());
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

        $response = FootballApi::seasons($seasonId)->squadsByTeam($teamId);
        $this->assertEquals("/v3/football/squads/seasons/$seasonId/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_venues_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::seasons($seasonId)->venues();
        $this->assertEquals("/v3/football/venues/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_news_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::seasons($seasonId)->news();
        $this->assertEquals("/v3/football/news/pre-match/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_referees_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::seasons($seasonId)->referees();
        $this->assertEquals("/v3/football/referees/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
