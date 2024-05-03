<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class ContinentsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_continents()
    {
        $response = FootballApi::continents()->all();
        $this->assertEquals('/v3/core/continents', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_continent()
    {
        $id = 1;

        $response = FootballApi::continents()->find($id);
        $this->assertEquals("/v3/core/continents/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }
}
