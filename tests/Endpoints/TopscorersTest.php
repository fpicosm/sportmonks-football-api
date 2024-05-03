<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class TopscorersTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_topscorers_by_season_id()
    {
        $seasonId = 2;

        $response = FootballApi::topscorers()->bySeason($seasonId);
        $this->assertEquals("/v3/football/topscorers/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_topscorers_by_stage_id()
    {
        $stageId = 2;

        $response = FootballApi::topscorers()->byStage($stageId);
        $this->assertEquals("/v3/football/topscorers/stages/$stageId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
