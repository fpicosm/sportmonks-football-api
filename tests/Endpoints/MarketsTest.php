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
    public function it_returns_all_markets ()
    {
        $data = FootballApi::markets()->all()->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_market ()
    {
        $data = FootballApi::markets()->find(1)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);

        $this->assertEquals('3Way Result', $data->name);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_market_fixtures ()
    {
        $data = FootballApi::markets(1)->fixtures()->data;

        $this->assertIsArray($data);

        $items = collect($data);
        if (!$items->count()) return;

        $this->assertIsObject($items->first());
        $this->assertObjectHasAttribute('id', $items->first());
        $this->assertObjectHasAttribute('season_id', $items->first());
    }
}
