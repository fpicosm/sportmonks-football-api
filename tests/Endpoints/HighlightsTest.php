<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class HighlightsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_commentaries_by_fixture ()
    {
        $data = FootballApi::highlights()->byFixture(16924614)->data;

        $this->assertIsArray($data);
        $this->assertEquals('video', $data[0]->type);
    }
}
