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
        $url = FootballApi::enrichments()->all()->url->getPath();
        $this->assertEquals('/v3/my/enrichments', $url);
    }
}
