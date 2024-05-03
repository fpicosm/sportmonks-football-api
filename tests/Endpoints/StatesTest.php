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
        $response = FootballApi::states()->all();
        $this->assertEquals('/v3/football/states', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_state()
    {
        $id = 1;

        $response = FootballApi::states()->find($id);
        $this->assertEquals("/v3/football/states/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }
}
