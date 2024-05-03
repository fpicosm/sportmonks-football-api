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
    public function it_returns_all_commentaries()
    {
        $response = FootballApi::commentaries()->all();
        $this->assertEquals('/v3/football/commentaries', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_commentaries_by_fixture_id()
    {
        $fixtureId = 463;

        $response = FootballApi::commentaries()->byFixture($fixtureId);
        $this->assertEquals("/v3/football/commentaries/fixtures/$fixtureId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
