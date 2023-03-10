<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class TeamsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_teams ()
    {
        $url = FootballApi::teams()->all()->url->getPath();
        $this->assertEquals('/v3/football/teams', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_team ()
    {
        $id = 180;
        $url = FootballApi::teams()->byId($id)->url->getPath();
        $this->assertEquals("/v3/football/teams/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_teams_by_country_id ()
    {
        $countryId = 320;
        $url = FootballApi::teams()->byCountryId($countryId)->url->getPath();
        $this->assertEquals("/v3/football/teams/countries/$countryId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_teams_search ()
    {
        $name = 'Hors';
        $url = FootballApi::teams()->search($name)->url->getPath();
        $this->assertEquals("/v3/football/teams/search/$name", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_teams_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::teams()->bySeasonId($seasonId)->url->getPath();
        $this->assertEquals("/v3/football/teams/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_fixtures_by_date_range_for_a_team ()
    {
        $from = '2022-07-17';
        $to = '2022-07-25';
        $teamId = 49;

        $url = FootballApi::teams($teamId)->fixturesByDateRange($from, $to)->url->getPath();
        $this->assertEquals("/v3/football/fixtures/between/$from/$to/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_head_to_head_for_two_teams ()
    {
        $firstTeam = 2650;
        $secondTeam = 86;

        $url = FootballApi::teams($firstTeam)->headToHead($secondTeam)->url->getPath();
        $this->assertEquals("/v3/football/fixtures/head-to-head/$firstTeam/$secondTeam", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_leagues_for_a_team ()
    {
        $teamId = 282;
        $url = FootballApi::teams($teamId)->allLeagues()->url->getPath();
        $this->assertEquals("/v3/football/leagues/teams/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_current_leagues_for_a_team ()
    {
        $teamId = 282;
        $url = FootballApi::teams($teamId)->currentLeagues()->url->getPath();
        $this->assertEquals("/v3/football/leagues/teams/$teamId/current", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_schedules_for_a_team ()
    {
        $teamId = 282;
        $url = FootballApi::teams($teamId)->schedules()->url->getPath();
        $this->assertEquals("/v3/football/schedules/teams/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_schedules_by_season_id_for_a_team ()
    {
        $seasonId = 19686;
        $teamId = 282;
        $url = FootballApi::teams($teamId)->schedulesBySeasonId($seasonId)->url->getPath();
        $this->assertEquals("/v3/football/schedules/seasons/$seasonId/teams/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_seasons_for_a_team ()
    {
        $teamId = 282;
        $url = FootballApi::teams($teamId)->seasons()->url->getPath();
        $this->assertEquals("/v3/football/seasons/teams/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_current_domestic_squads_for_a_team ()
    {
        $teamId = 282;
        $url = FootballApi::teams($teamId)->squads()->url->getPath();
        $this->assertEquals("/v3/football/squads/teams/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_squads_by_season_id_for_a_team ()
    {
        $seasonId = 19686;
        $teamId = 282;
        $url = FootballApi::teams($teamId)->squadsBySeasonId($seasonId)->url->getPath();
        $this->assertEquals("/v3/football/squads/seasons/$seasonId/teams/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_transfers_for_a_team ()
    {
        $teamId = 282;
        $url = FootballApi::teams($teamId)->transfers()->url->getPath();
        $this->assertEquals("/v3/football/transfers/teams/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_rivals_for_a_team ()
    {
        $teamId = 282;
        $url = FootballApi::teams($teamId)->rivals()->url->getPath();
        $this->assertEquals("/v3/football/rivals/teams/$teamId", $url);
    }
}