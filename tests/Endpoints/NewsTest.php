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
    public function it_returns_all_news(): void
    {
        $response = FootballApi::news()->all();
        $this->assertEquals('/v3/football/news/pre-match', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_news_by_season_id(): void
    {
        $seasonId = 21646;

        $response = FootballApi::news()->bySeason($seasonId);
        $this->assertEquals("/v3/football/news/pre-match/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_news_upcoming(): void
    {
        $response = FootballApi::news()->upcoming();
        $this->assertEquals('/v3/football/news/pre-match/upcoming', $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
