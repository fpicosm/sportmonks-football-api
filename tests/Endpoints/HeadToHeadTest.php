<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class HeadToHeadTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_head_to_head_between_two_teams ()
    {
        $data = FootballApi::headToHead()->byTeams(83, 7980)->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
        $this->assertObjectHasAttribute('season_id', $data[0]);
    }
}
