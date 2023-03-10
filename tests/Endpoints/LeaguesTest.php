<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class LeaguesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_leagues ()
    {
        $url = FootballApi::leagues()->all()->url->getPath();
        $this->assertEquals('/v3/football/leagues', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_league ()
    {
        $id = 564;
        $url = FootballApi::leagues()->byId($id)->url->getPath();
        $this->assertEquals("/v3/football/leagues/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_live_leagues ()
    {
        $url = FootballApi::leagues()->live()->url->getPath();
        $this->assertEquals('/v3/football/leagues/live', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_leagues_by_fixture_date ()
    {
        $date = '2022-01-01';
        $url = FootballApi::leagues()->byFixtureDate($date)->url->getPath();
        $this->assertEquals("/v3/football/leagues/fixtures/date/$date", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_leagues_by_country_id ()
    {
        $countryId = 320;
        $url = FootballApi::leagues()->byCountryId($countryId)->url->getPath();
        $this->assertEquals("/v3/football/leagues/countries/$countryId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_leagues_search ()
    {
        $name = 'La Liga';
        $url = FootballApi::leagues()->search($name)->url->getPath();
        $this->assertEquals('/v3/football/leagues/search/La%20Liga', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_leagues_by_team_id ()
    {
        $teamId = 180;
        $url = FootballApi::leagues()->allByTeamId($teamId)->url->getPath();
        $this->assertEquals("/v3/football/leagues/teams/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_current_leagues_by_team_id ()
    {
        $teamId = 180;
        $url = FootballApi::leagues()->currentByTeamId($teamId)->url->getPath();
        $this->assertEquals("/v3/football/leagues/teams/$teamId/current", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_league_standings ()
    {
        $leagueId = 271;
        $url = FootballApi::leagues($leagueId)->liveStandings()->url->getPath();
        $this->assertEquals("/v3/football/standings/live/leagues/$leagueId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_league_predictions ()
    {
        $leagueId = 271;
        $url = FootballApi::leagues($leagueId)->predictions()->url->getPath();
        $this->assertEquals("/v3/football/predictions/predictability/leagues/$leagueId", $url);
    }
}
