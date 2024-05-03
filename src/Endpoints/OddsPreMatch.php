<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\OddsClient;

class OddsPreMatch extends OddsClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standard-odds-feed/pre-match-odds/get-all-odds Documentation
     */
    public function all(array $query = []): object
    {
        return $this->call('pre-match', $query);
    }

    /**
     * @param int $fixtureId the id of the fixture
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standard-odds-feed/pre-match-odds/get-odds-by-fixture-id Documentation
     */
    public function byFixture(int $fixtureId, array $query = []): object
    {
        return $this->call("pre-match/fixtures/$fixtureId", $query);
    }

    /**
     * @param int $fixtureId the id of the fixture
     * @param int $bookmakerId the id of the bookmaker
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standard-odds-feed/pre-match-odds/get-odds-by-fixture-id-and-bookmaker-id Documentation
     */
    public function byFixtureAndBookmaker(int $fixtureId, int $bookmakerId, array $query = []): object
    {
        return $this->call("pre-match/fixtures/$fixtureId/bookmakers/$bookmakerId", $query);
    }

    /**
     * @param int $fixtureId the id of the fixture
     * @param int $marketId the id of the market
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standard-odds-feed/pre-match-odds/get-odds-by-fixture-id-and-market-id Documentation
     */
    public function byFixtureAndMarket(int $fixtureId, int $marketId, array $query = []): object
    {
        return $this->call("pre-match/fixtures/$fixtureId/markets/$marketId", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standard-odds-feed/pre-match-odds/get-last-updated-odds Documentation
     */
    public function lastUpdated(array $query = []): object
    {
        return $this->call('pre-match/latest', $query);
    }
}
