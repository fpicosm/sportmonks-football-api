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
    public function it_returns_all_rounds()
    {
        $response = FootballApi::rounds()->all();
        $this->assertEquals('/v3/football/rounds', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_round()
    {
        $id = 43;

        $response = FootballApi::rounds()->find($id);
        $this->assertEquals("/v3/football/rounds/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_rounds_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::rounds()->bySeason($seasonId);
        $this->assertEquals("/v3/football/rounds/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_rounds_search()
    {
        $name = 1;

        $response = FootballApi::rounds()->search($name);
        $this->assertEquals("/v3/football/rounds/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_standings_by_round_id()
    {
        $roundId = 43;

        $response = FootballApi::rounds($roundId)->standings();
        $this->assertEquals("/v3/football/standings/rounds/$roundId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
