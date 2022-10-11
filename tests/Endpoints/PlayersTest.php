<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class PlayersTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_player ()
    {
        $data = FootballApi::players()->find(172104)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);
        $this->assertEquals("James Forrest", $data->fullname);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_players_search ()
    {
        $data = FootballApi::players()->search('James Forrest')->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $player = collect($data)->firstWhere('player_id', 172104);
        $this->assertIsObject($player);
    }
}
