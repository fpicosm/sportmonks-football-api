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
    public function it_returns_all_news () : void
    {
        $url = FootballApi::news()->all()->url->getPath();
        $this->assertEquals('/v3/football/news/pre-match', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_news_by_season_id () : void
    {
        $seasonId = 19734;
        $url = FootballApi::news()->bySeasonId($seasonId)->url->getPath();
        $this->assertEquals("/v3/football/news/pre-match/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_news_upcoming () : void
    {
        $url = FootballApi::news()->upcoming()->url->getPath();
        $this->assertEquals('/v3/football/news/pre-match/upcoming', $url);
    }
}