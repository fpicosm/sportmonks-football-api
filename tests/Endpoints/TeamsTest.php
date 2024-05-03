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
    public function it_returns_all_teams()
    {
        $response = FootballApi::teams()->all();
        $this->assertEquals('/v3/football/teams', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_team()
    {
        $id = 1;

        $response = FootballApi::teams()->find($id);
        $this->assertEquals("/v3/football/teams/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_teams_by_country_id()
    {
        $countryId = 462;

        $response = FootballApi::teams()->byCountry($countryId);
        $this->assertEquals("/v3/football/teams/countries/$countryId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_teams_search()
    {
        $name = 'West';

        $response = FootballApi::teams()->search($name);
        $this->assertEquals("/v3/football/teams/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_teams_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::teams()->bySeason($seasonId);
        $this->assertEquals("/v3/football/teams/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_fixtures_by_date_range_for_a_team()
    {
        $from = '2024-04-26';
        $to = '2024-04-28';
        $teamId = 1;

        $response = FootballApi::teams($teamId)->fixturesByDateRange($from, $to);
        $this->assertEquals("/v3/football/fixtures/between/$from/$to/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_head_to_head_for_two_teams()
    {
        $firstTeam = 1;
        $secondTeam = 2;

        $response = FootballApi::teams($firstTeam)->headToHead($secondTeam);
        $this->assertEquals("/v3/football/fixtures/head-to-head/$firstTeam/$secondTeam", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_leagues_for_a_team()
    {
        $teamId = 1;

        $response = FootballApi::teams($teamId)->allLeagues();
        $this->assertEquals("/v3/football/leagues/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_current_leagues_for_a_team()
    {
        $teamId = 1;

        $response = FootballApi::teams($teamId)->currentLeagues();
        $this->assertEquals("/v3/football/leagues/teams/$teamId/current", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_schedules_for_a_team()
    {
        $teamId = 1;

        $response = FootballApi::teams($teamId)->schedules();
        $this->assertEquals("/v3/football/schedules/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_schedules_by_season_id_for_a_team()
    {
        $seasonId = 21646;
        $teamId = 1;

        $response = FootballApi::teams($teamId)->schedulesBySeason($seasonId);
        $this->assertEquals("/v3/football/schedules/seasons/$seasonId/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_seasons_for_a_team()
    {
        $teamId = 1;

        $response = FootballApi::teams($teamId)->seasons();
        $this->assertEquals("/v3/football/seasons/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_current_domestic_squads_for_a_team()
    {
        $teamId = 1;

        $response = FootballApi::teams($teamId)->squads();
        $this->assertEquals("/v3/football/squads/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_squads_by_season_id_for_a_team()
    {
        $seasonId = 21646;
        $teamId = 1;

        $response = FootballApi::teams($teamId)->squadsBySeason($seasonId);
        $this->assertEquals("/v3/football/squads/seasons/$seasonId/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_transfers_for_a_team()
    {
        $teamId = 1;

        $response = FootballApi::teams($teamId)->transfers();
        $this->assertEquals("/v3/football/transfers/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_rivals_for_a_team()
    {
        $teamId = 1;

        $response = FootballApi::teams($teamId)->rivals();
        $this->assertEquals("/v3/football/rivals/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
