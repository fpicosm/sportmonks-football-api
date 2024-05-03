<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class StandingsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_standings()
    {
        $response = FootballApi::standings()->all();
        $this->assertEquals('/v3/football/standings', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_standings_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::standings()->bySeason($seasonId);
        $this->assertEquals("/v3/football/standings/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_standings_by_round_id()
    {
        $roundId = 307065;

        $response = FootballApi::standings()->byRound($roundId);
        $this->assertEquals("/v3/football/standings/rounds/$roundId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_correction_standings_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::standings()->correctionBySeason($seasonId);
        $this->assertEquals("/v3/football/standings/corrections/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_live_standings_by_league_id()
    {
        $leagueId = 8;

        $response = FootballApi::standings()->liveByLeague($leagueId);
        $this->assertEquals("/v3/football/standings/live/leagues/$leagueId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
