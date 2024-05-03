<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class EnrichmentsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_my_enrichments()
    {
        $response = FootballApi::enrichments()->all();
        $this->assertEquals('/v3/my/enrichments', $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
