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
    public function it_returns_all_continents ()
    {
        $url = FootballApi::continents()->all()->url->getPath();
        $this->assertEquals('/v3/core/continents', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_continent ()
    {
        $id = 1;
        $url = FootballApi::continents()->byId($id)->url->getPath();
        $this->assertEquals("/v3/core/continents/$id", $url);
    }
}
