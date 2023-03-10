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
    public function it_returns_topscorers_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::topscorers()->bySeasonId($seasonId)->url->getPath();
        $this->assertEquals("/v3/football/topscorers/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_topscorers_by_stage_id ()
    {
        $stageId = 19686;
        $url = FootballApi::topscorers()->byStageId($stageId)->url->getPath();
        $this->assertEquals("/v3/football/topscorers/stages/$stageId", $url);
    }
}