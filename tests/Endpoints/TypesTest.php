<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class TypesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_types ()
    {
        $url = FootballApi::types()->all()->url->getPath();
        $this->assertEquals('/v3/core/types', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_type ()
    {
        $id = 1;
        $url = FootballApi::types()->byId($id)->url->getPath();
        $this->assertEquals("/v3/core/types/$id", $url);
    }
}