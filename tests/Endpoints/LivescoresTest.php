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
    public function it_returns_inplay_livescores(): void
    {
        $response = FootballApi::livescores()->inplay();
        $this->assertEquals('/v3/football/livescores/inplay', $response->url->getPath());
        $this->assertEquals(200, $response->statusCode);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_livescores(): void
    {
        $response = FootballApi::livescores()->all();
        $this->assertEquals('/v3/football/livescores', $response->url->getPath());
        $this->assertEquals(200, $response->statusCode);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_last_updated_livescores(): void
    {
        $response = FootballApi::livescores()->lastUpdated();
        $this->assertEquals('/v3/football/livescores/latest', $response->url->getPath());
        $this->assertEquals(200, $response->statusCode);
    }
}
