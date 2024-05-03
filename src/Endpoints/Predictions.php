<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Predictions extends FootballClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-probabilities Docs
     */
    public function probabilities(array $query = []): object
    {
        return $this->call('predictions/probabilities', $query);
    }

    /**
     * @param int $leagueId the league id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-predictability-by-league-id Docs
     */
    public function byLeagueId(int $leagueId, array $query = []): object
    {
        return $this->call("predictions/predictability/leagues/$leagueId", $query);
    }

    /**
     * @param int $fixtureId the fixture id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-probabilities-by-fixture-id Docs
     */
    public function byFixtureId(int $fixtureId, array $query = []): object
    {
        return $this->call("predictions/probabilities/fixtures/$fixtureId", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-value-bets Docs
     */
    public function valueBets(array $query = []): object
    {
        return $this->call('predictions/value-bets', $query);
    }
}
