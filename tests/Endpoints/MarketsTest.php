<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class MarketsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_markets(): void
    {
        $response = FootballApi::markets()->all();
        $this->assertEquals('/v3/odds/markets', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_markets(): void
    {
        $id = 1;

        $response = FootballApi::markets()->find($id);
        $this->assertEquals("/v3/odds/markets/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_search_markets(): void
    {
        $name = 'Bet';

        $response = FootballApi::markets()->search($name);
        $this->assertEquals("/v3/odds/markets/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
