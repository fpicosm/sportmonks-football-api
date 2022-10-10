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
    public function it_returns_a_season_topscorers ()
    {
        $data = FootballApi::topscorers()->bySeason(19799)->data;

        $this->assertIsObject($data);
        $this->assertObjectHasAttribute('goalscorers', $data);
        $this->assertNotEmpty($data->goalscorers->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_aggregated_topscorers ()
    {
        $data = FootballApi::topscorers()->aggregatedBySeason(19799)->data;

        $this->assertIsObject($data);
        $this->assertObjectHasAttribute('aggregatedGoalscorers', $data);
        $this->assertNotEmpty($data->aggregatedGoalscorers->data);
    }
}
