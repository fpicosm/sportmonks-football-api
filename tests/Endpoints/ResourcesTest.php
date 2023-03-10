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
    public function it_returns_my_resources ()
    {
        $url = FootballApi::resources()->all()->url->getPath();
        $this->assertEquals('/v3/my/resources', $url);
    }
}
