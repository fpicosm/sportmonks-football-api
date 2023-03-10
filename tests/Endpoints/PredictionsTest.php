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
    public function it_returns_all_probabilities ()
    {
        $url = FootballApi::predictions()->probabilities()->url->getPath();
        $this->assertEquals('/v3/football/predictions/probabilities', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_predictions_by_league_id ()
    {
        $leagueId = 8;
        $url = FootballApi::predictions()->byLeagueId($leagueId)->url->getPath();
        $this->assertEquals("/v3/football/predictions/predictability/leagues/$leagueId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_predictions_by_fixture_id ()
    {
        $fixtureId = 16774022;
        $url = FootballApi::predictions()->byFixtureId($fixtureId)->url->getPath();
        $this->assertEquals("/v3/football/predictions/probabilities/fixtures/$fixtureId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_predictions_all_value_bets ()
    {
        $url = FootballApi::predictions()->valueBets()->url->getPath();
        $this->assertEquals('/v3/football/predictions/value-bets', $url);
    }
}