<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class RoundsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_rounds ()
    {
        $url = FootballApi::rounds()->all()->url->getPath();
        $this->assertEquals('/v3/football/rounds', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_round ()
    {
        $id = 23317;
        $url = FootballApi::rounds()->byId($id)->url->getPath();
        $this->assertEquals("/v3/football/rounds/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_rounds_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::rounds()->bySeasonId($seasonId)->url->getPath();
        $this->assertEquals("/v3/football/rounds/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_rounds_search ()
    {
        $name = 2;
        $url = FootballApi::rounds()->search($name)->url->getPath();
        $this->assertEquals("/v3/football/rounds/search/$name", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_standings_by_round_id ()
    {
        $roundId = 23318;
        $url = FootballApi::rounds($roundId)->standings()->url->getPath();
        $this->assertEquals("/v3/football/standings/rounds/$roundId", $url);
    }
}