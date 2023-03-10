<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class LivescoresTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_inplay_livescores () : void
    {
        $url = FootballApi::livescores()->inplay()->url->getPath();
        $this->assertEquals('/v3/football/livescores/inplay', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_livescores () : void
    {
        $url = FootballApi::livescores()->all()->url->getPath();
        $this->assertEquals('/v3/football/livescores', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_latest_livescores () : void
    {
        $url = FootballApi::livescores()->latest()->url->getPath();
        $this->assertEquals('/v3/football/livescores/latest', $url);
    }
}