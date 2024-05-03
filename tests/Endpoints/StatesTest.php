<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class StatesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_states()
    {
        $url = FootballApi::states()->all()->url->getPath();
        $this->assertEquals('/v3/football/states', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_state()
    {
        $id = 1;
        $url = FootballApi::states()->byId($id)->url->getPath();
        $this->assertEquals("/v3/football/states/$id", $url);
    }
}
