<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class NewsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_news ()
    {
        $data = FootballApi::news()->all()->data;

        $this->assertIsArray($data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_upcoming_news ()
    {
        $data = FootballApi::news()->upcoming()->data;

        $this->assertIsArray($data);
    }
}
