<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class StagesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_stages()
    {
        $response = FootballApi::stages()->all();
        $this->assertEquals('/v3/football/stages', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_stage()
    {
        $id = 2;

        $response = FootballApi::stages()->find($id);
        $this->assertEquals("/v3/football/stages/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_stages_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::stages()->bySeason($seasonId);
        $this->assertEquals("/v3/football/stages/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_stages_search()
    {
        $name = 'Regular';

        $response = FootballApi::stages()->search($name);
        $this->assertEquals("/v3/football/stages/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_topscorers_by_stage_id()
    {
        $stageId = 1100;

        $response = FootballApi::stages($stageId)->topscorers();
        $this->assertEquals("/v3/football/topscorers/stages/$stageId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
