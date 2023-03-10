<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class CommentariesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_commentaries ()
    {
        $url = FootballApi::commentaries()->all()->url->getPath();
        $this->assertEquals('/v3/football/commentaries', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_commentaries_by_fixture_id ()
    {
        $fixtureId = 16808591;
        $url = FootballApi::commentaries()->byFixtureId($fixtureId)->url->getPath();
        $this->assertEquals("/v3/football/commentaries/fixtures/$fixtureId", $url);
    }
}
