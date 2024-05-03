<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\OddsClient;

class OddsInplay extends OddsClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standard-odds-feed/inplay-odds/get-all-inplay-odds Documentation
     */
    public function all(array $query = []): object
    {
        return $this->call('inplay', $query);
    }

    /**
     * @param int $fixtureId the id of the fixture
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standard-odds-feed/inplay-odds/get-inplay-odds-by-fixture-id Documentation
     */
    public function byFixture(int $fixtureId, array $query = []): object
    {
        return $this->call("inplay/fixtures/$fixtureId", $query);
    }

    /**
     * @param int $fixtureId the id of the fixture
     * @param int $bookmakerId the id of the bookmaker
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standard-odds-feed/inplay-odds/get-inplay-odds-by-fixture-id-and-bookmaker-id Documentation
     */
    public function byFixtureAndBookmaker(int $fixtureId, int $bookmakerId, array $query = []): object
    {
        return $this->call("inplay/fixtures/$fixtureId/bookmakers/$bookmakerId", $query);
    }

    /**
     * @param int $fixtureId the id of the fixture
     * @param int $marketId the id of the market
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standard-odds-feed/inplay-odds/get-inplay-odds-by-fixture-id-and-market-id Documentation
     */
    public function byFixtureAndMarket(int $fixtureId, int $marketId, array $query = []): object
    {
        return $this->call("inplay/fixtures/$fixtureId/markets/$marketId", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standard-odds-feed/inplay-odds/get-last-updated-inplay-odds Documentation
     */
    public function lastUpdated(array $query = []): object
    {
        return $this->call('inplay/latest', $query);
    }
}
