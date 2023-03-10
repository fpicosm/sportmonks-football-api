<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class FiltersTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_my_filters ()
    {
        $url = FootballApi::filters()->all()->url->getPath();
        $this->assertEquals('/v3/my/filters/entity', $url);
    }
}
