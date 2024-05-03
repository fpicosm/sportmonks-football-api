<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\OddsClient;

class OddsPremium extends OddsClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/premium-odds-feed/premium-pre-match-odds/get-all-premium-odds Documentation
     */
    public function all(array $query = []): object
    {
        return $this->call('premium', $query);
    }

    /**
     * @param int $fixtureId the id of the fixture
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/premium-odds-feed/premium-pre-match-odds/get-premium-odds-by-fixture-id Documentation
     */
    public function byFixture(int $fixtureId, array $query = []): object
    {
        return $this->call("premium/fixtures/$fixtureId", $query);
    }

    /**
     * @param int $fixtureId the id of the fixture
     * @param int $bookmakerId the id of the bookmaker
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/premium-odds-feed/premium-pre-match-odds/get-premium-odds-by-fixture-id-and-bookmaker-id Documentation
     */
    public function byFixtureAndBookmaker(int $fixtureId, int $bookmakerId, array $query = []): object
    {
        return $this->call("premium/fixtures/$fixtureId/bookmakers/$bookmakerId", $query);
    }

    /**
     * @param int $fixtureId the id of the fixture
     * @param int $marketId the id of the market
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/premium-odds-feed/premium-pre-match-odds/get-premium-odds-by-fixture-id-and-market-id Documentation
     */
    public function byFixtureAndMarket(int $fixtureId, int $marketId, array $query = []): object
    {
        return $this->call("premium/fixtures/$fixtureId/markets/$marketId", $query);
    }

    /**
     * @param string $from from-timestamp
     * @param string $to to-timestamp
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/premium-odds-feed/premium-pre-match-odds/get-updated-premium-odds-between-time-range Documentation
     */
    public function updatedBetween(string $from, string $to, array $query = []): object
    {
        return $this->call("premium/updated/between/$from/$to", $query);
    }

    /**
     * @param string $from from-timestamp
     * @param string $to to-timestamp
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/premium-odds-feed/premium-pre-match-odds/get-updated-historical-odds-between-time-range Documentation
     */
    public function historicalBetween(string $from, string $to, array $query = []): object
    {
        return $this->call("premium/history/updated/between/$from/$to", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/premium-odds-feed/premium-pre-match-odds/get-all-historical-odds Documentation
     */
    public function historical(array $query = []): object
    {
        return $this->call('premium/history', $query);
    }
}
