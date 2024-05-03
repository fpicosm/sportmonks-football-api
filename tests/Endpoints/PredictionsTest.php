<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class PredictionsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_probabilities()
    {
        $response = FootballApi::predictions()->probabilities();
        $this->assertEquals('/v3/football/predictions/probabilities', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_predictions_by_league_id()
    {
        $leagueId = 8;

        $response = FootballApi::predictions()->byLeague($leagueId);
        $this->assertEquals("/v3/football/predictions/predictability/leagues/$leagueId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_predictions_by_fixture_id()
    {
        $fixtureId = 16774022;

        $response = FootballApi::predictions()->byFixture($fixtureId);
        $this->assertEquals("/v3/football/predictions/probabilities/fixtures/$fixtureId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_predictions_all_value_bets()
    {
        $response = FootballApi::predictions()->valueBets();
        $this->assertEquals('/v3/football/predictions/value-bets', $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
