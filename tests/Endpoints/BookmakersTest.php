<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class BookmakersTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_bookmakers()
    {
        $response = FootballApi::bookmakers()->all();
        $this->assertEquals('/v3/odds/bookmakers', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_bookmaker()
    {
        $id = 1;

        $response = FootballApi::bookmakers()->find($id);
        $this->assertEquals("/v3/odds/bookmakers/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_bookmakers_search()
    {
        $name = 'Bet';

        $response = FootballApi::bookmakers()->search($name);
        $this->assertEquals("/v3/odds/bookmakers/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_bookmakers_by_fixture()
    {
        $fixtureId = 18528479;

        $response = FootballApi::bookmakers()->byFixture($fixtureId);
        $this->assertEquals("/v3/odds/bookmakers/fixtures/$fixtureId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
