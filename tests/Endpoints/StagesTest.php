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
    public function it_returns_all_stages ()
    {
        $url = FootballApi::stages()->all()->url->getPath();
        $this->assertEquals('/v3/football/stages', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_stage ()
    {
        $id = 1100;
        $url = FootballApi::stages()->byId($id)->url->getPath();
        $this->assertEquals("/v3/football/stages/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_stages_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::stages()->bySeasonId($seasonId)->url->getPath();
        $this->assertEquals("/v3/football/stages/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_stages_search ()
    {
        $name = 'Championship';
        $url = FootballApi::stages()->search($name)->url->getPath();
        $this->assertEquals("/v3/football/stages/search/$name", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_topscorers_by_stage_id ()
    {
        $stageId = 1100;
        $url = FootballApi::stages($stageId)->topscorers()->url->getPath();
        $this->assertEquals("/v3/football/topscorers/stages/$stageId", $url);
    }
}