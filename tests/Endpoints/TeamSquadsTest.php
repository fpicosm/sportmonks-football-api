<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class TeamSquadsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_the_squad_for_a_season_and_team ()
    {
        $data = FootballApi::teamSquads()->bySeasonAndTeam(19799, 83)->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $this->assertIsObject(collect($data)->firstWhere('player_id', 31000));
    }
}
