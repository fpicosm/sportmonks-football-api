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
    public function it_returns_all_leagues()
    {
        $response = FootballApi::leagues()->all();
        $this->assertEquals('/v3/football/leagues', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_league()
    {
        $id = 8;

        $response = FootballApi::leagues()->find($id);
        $this->assertEquals("/v3/football/leagues/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_live_leagues()
    {
        $response = FootballApi::leagues()->live();
        $this->assertEquals('/v3/football/leagues/live', $response->url->getPath());
        $this->assertEquals(200, $response->statusCode);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_leagues_by_fixture_date()
    {
        $date = '2022-01-01';

        $response = FootballApi::leagues()->byFixtureDate($date);
        $this->assertEquals("/v3/football/leagues/date/$date", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_leagues_by_country_id()
    {
        $countryId = 462;

        $response = FootballApi::leagues()->byCountry($countryId);
        $this->assertEquals("/v3/football/leagues/countries/$countryId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_leagues_search()
    {
        $name = 'Premier';

        $response = FootballApi::leagues()->search($name);
        $this->assertEquals("/v3/football/leagues/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_leagues_by_team_id()
    {
        $teamId = 1;

        $response = FootballApi::leagues()->allByTeam($teamId);
        $this->assertEquals("/v3/football/leagues/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_current_leagues_by_team_id()
    {
        $teamId = 1;

        $response = FootballApi::leagues()->currentByTeam($teamId);
        $this->assertEquals("/v3/football/leagues/teams/$teamId/current", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_league_standings()
    {
        $leagueId = 8;

        $response = FootballApi::leagues($leagueId)->liveStandings();
        $this->assertEquals("/v3/football/standings/live/leagues/$leagueId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_league_predictions()
    {
        $leagueId = 8;

        $response = FootballApi::leagues($leagueId)->predictions();
        $this->assertEquals("/v3/football/predictions/predictability/leagues/$leagueId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
