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
    public function it_returns_all_markets () : void
    {
        $url = FootballApi::markets()->all()->url->getPath();
        $this->assertEquals('/v3/odds/markets', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_markets () : void
    {
        $id = 1;
        $url = FootballApi::markets()->byId($id)->url->getPath();
        $this->assertEquals("/v3/odds/markets/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_search_markets () : void
    {
        $name = '10Bet';
        $url = FootballApi::markets()->search($name)->url->getPath();
        $this->assertEquals("/v3/odds/markets/search/$name", $url);
    }
}
