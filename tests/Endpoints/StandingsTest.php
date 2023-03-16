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
    public function it_returns_all_standings ()
    {
        $url = FootballApi::standings()->all()->url->getPath();
        $this->assertEquals('/v3/football/standings', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_standings_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::standings()->bySeasonId($seasonId)->url->getPath();
        $this->assertEquals("/v3/football/standings/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_standings_by_round_id ()
    {
        $roundId = 23318;
        $url = FootballApi::standings()->byRoundId($roundId)->url->getPath();
        $this->assertEquals("/v3/football/standings/rounds/$roundId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_correction_standings_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::standings()->correctionBySeasonId($seasonId)->url->getPath();
        $this->assertEquals("/v3/football/standings/corrections/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_live_standings_by_league_id ()
    {
        $leagueId = 271;
        $url = FootballApi::standings()->liveByLeagueId($leagueId)->url->getPath();
        $this->assertEquals("/v3/football/standings/live/leagues/$leagueId", $url);
    }
}
