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
    public function it_returns_all_livescores ()
    {
        $data = FootballApi::livescores()->all()->data;

        $this->assertIsArray($data);

        $items = collect($data);
        if (!$items->count()) return;

        $this->assertIsObject($items->first());
        $this->assertObjectHasAttribute('id', $items->first());
        $this->assertObjectHasAttribute('season_id', $items->first());
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_playing_livescores ()
    {
        $data = FootballApi::livescores()->live()->data;

        $this->assertIsArray($data);
    }
}
