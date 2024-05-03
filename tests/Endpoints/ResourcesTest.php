<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class ResourcesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_my_resources()
    {
        $response = FootballApi::resources()->all();
        $this->assertEquals('/v3/my/resources', $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
