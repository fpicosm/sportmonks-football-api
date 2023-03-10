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
    public function it_returns_all_seasons ()
    {
        $url = FootballApi::seasons()->all()->url->getPath();
        $this->assertEquals('/v3/football/seasons', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_season ()
    {
        $id = 19686;
        $url = FootballApi::seasons()->byId($id)->url->getPath();
        $this->assertEquals("/v3/football/seasons/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_seasons_by_team_id ()
    {
        $teamId = 282;
        $url = FootballApi::seasons()->byTeamId($teamId)->url->getPath();
        $this->assertEquals("/v3/football/seasons/teams/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_seasons_search ()
    {
        $name = 2022;
        $url = FootballApi::seasons()->search($name)->url->getPath();
        $this->assertEquals("/v3/football/seasons/search/$name", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_schedules_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::seasons($seasonId)->schedules()->url->getPath();
        $this->assertEquals("/v3/football/schedules/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_schedules_by_season_and_team_id ()
    {
        $seasonId = 19686;
        $teamId = 282;

        $url = FootballApi::seasons($seasonId)->schedulesByTeamId($teamId)->url->getPath();
        $this->assertEquals("/v3/football/schedules/seasons/$seasonId/teams/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_stages_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::seasons($seasonId)->stages()->url->getPath();
        $this->assertEquals("/v3/football/stages/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_rounds_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::seasons($seasonId)->rounds()->url->getPath();
        $this->assertEquals("/v3/football/rounds/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_standings_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::seasons($seasonId)->standings()->url->getPath();
        $this->assertEquals("/v3/football/standings/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_standings_correction_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::seasons($seasonId)->standingsCorrection()->url->getPath();
        $this->assertEquals("/v3/football/standings/corrections/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_topscorers_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::seasons($seasonId)->topscorers()->url->getPath();
        $this->assertEquals("/v3/football/topscorers/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_teams_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::seasons($seasonId)->teams()->url->getPath();
        $this->assertEquals("/v3/football/teams/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_squads_by_season_and_team_id ()
    {
        $seasonId = 19686;
        $teamId = 282;
        $url = FootballApi::seasons($seasonId)->squadsByTeamId($teamId)->url->getPath();
        $this->assertEquals("/v3/football/squads/seasons/$seasonId/teams/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_venues_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::seasons($seasonId)->venues()->url->getPath();
        $this->assertEquals("/v3/football/venues/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_news_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::seasons($seasonId)->news()->url->getPath();
        $this->assertEquals("/v3/football/news/pre-match/seasons/$seasonId", $url);
    }
}
