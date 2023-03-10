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
    public function it_returns_all_bookmakers ()
    {
        $url = FootballApi::bookmakers()->all()->url->getPath();
        $this->assertEquals('/v3/odds/bookmakers', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_bookmaker ()
    {
        $id = 1;
        $url = FootballApi::bookmakers()->byId($id)->url->getPath();
        $this->assertEquals("/v3/odds/bookmakers/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_bookmakers_search ()
    {
        $name = '10Bet';
        $url = FootballApi::bookmakers()->search($name)->url->getPath();
        $this->assertEquals("/v3/odds/bookmakers/search/$name", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_bookmakers_by_fixture ()
    {
        $fixtureId = 18528479;
        $url = FootballApi::bookmakers()->byFixtureId($fixtureId)->url->getPath();
        $this->assertEquals("/v3/odds/bookmakers/fixtures/$fixtureId", $url);
    }
}
