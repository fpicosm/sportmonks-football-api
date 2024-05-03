<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Fixtures extends FootballClient
{
    /** @var int|null the fixture id */
    protected ?int $id;

    /**
     * @param int|null $id the fixture id
     */
    public function __construct(?int $id = null)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-all-fixtures Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('fixtures', $query);
    }

    /**
     * @param int $id the fixture id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixture-by-id Docs
     */
    public function find(int $id, array $query = []): object
    {
        return $this->call("fixtures/$id", $query);
    }

    /**
     * @param string|array $ids the fixture ids
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-multiple-ids Docs
     */
    public function multiples(string|array $ids, array $query = []): object
    {
        if (is_array($ids)) $ids = join(',', $ids);
        return $this->call("fixtures/multi/$ids", $query);
    }

    /**
     * @param string $date the date (YYYY-MM-DD)
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date Docs
     */
    public function byDate(string $date, array $query = []): object
    {
        return $this->call("fixtures/date/$date", $query);
    }

    /**
     * @param string $from the start date (YYYY-MM-DD)
     * @param string $to the end date (YYYY-MM-DD)
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range Docs
     */
    public function byDateRange(string $from, string $to, array $query = []): object
    {
        return $this->call("fixtures/between/$from/$to", $query);
    }

    /**
     * @param string $from the start date (YYYY-MM-DD)
     * @param string $to the end date (YYYY-MM-DD)
     * @param int $teamId the team id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range-for-team Docs
     */
    public function byDateRangeForTeam(string $from, string $to, int $teamId, array $query = []): object
    {
        return $this->call("fixtures/between/$from/$to/$teamId", $query);
    }

    /**
     * @param int $firstTeamId the first team id
     * @param int $secondTeamId the second team id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-head-to-head Docs
     */
    public function headToHead(int $firstTeamId, int $secondTeamId, array $query = []): object
    {
        return $this->call("fixtures/head-to-head/$firstTeamId/$secondTeamId", $query);
    }

    /**
     * @param string $teamName the team name
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-search-by-name Docs
     */
    public function search(string $teamName, array $query = []): object
    {
        return $this->call("fixtures/search/$teamName", $query);
    }

    /**
     * @param int $marketId the market id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-upcoming-fixtures-by-market-id Docs
     */
    public function upcomingByMarket(int $marketId, array $query = []): object
    {
        return $this->call("fixtures/upcoming/markets/$marketId", $query);
    }

    /**
     * @param int $tvStationId the id of the tv-station
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-upcoming-fixtures-by-tv-station-id
     */
    public function upcomingByTvStation(int $tvStationId, array $query = []): object
    {
        return $this->call("fixtures/upcoming/tv-stations/$tvStationId", $query);
    }

    /**
     * @param int $tvStationId the id of the tv-station
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-past-fixtures-by-tv-station-id
     */
    public function pastByTvStation(int $tvStationId, array $query = []): object
    {
        return $this->call("fixtures/past/tv-stations/$tvStationId", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-latest-updated-fixtures Docs
     */
    public function lastUpdated(array $query = []): object
    {
        return $this->call('fixtures/latest', $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations/get-tv-stations-by-fixture-id Docs
     * @see  TvStations::byFixture
     */
    public function tvStations(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture_id set');
        return (new TvStations())->byFixture($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-probabilities-by-fixture-id Docs
     * @see  Predictions::byFixture
     */
    public function predictions(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture_id set');
        return (new Predictions())->byFixture($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-fixture-id Docs
     * @see  Bookmakers::byFixture
     */
    public function bookmakers(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture_id set');
        return (new Bookmakers())->byFixture($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/commentaries/get-commentaries-by-fixture-id Docs
     * @see Commentaries::byFixture
     */
    public function commentaries(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture_id set');
        return (new Commentaries())->byFixture($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see Predictions::valueBetsByFixture
     */
    public function valueBets(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture_id set');
        return (new Predictions())->valueBetsByFixture($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see OddsPreMatch::byFixture
     */
    public function preMatchOdds(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture_id set');
        return (new OddsPreMatch())->byFixture($this->id, $query);
    }

    /**
     * @param int $bookmakerId the id of the bookmaker
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see OddsPreMatch::byFixtureAndBookmaker
     */
    public function preMatchOddsByBookmaker(int $bookmakerId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture_id set');
        return (new OddsPreMatch())->byFixtureAndBookmaker($this->id, $bookmakerId, $query);
    }

    /**
     * @param int $marketId the id of the market
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see OddsPreMatch::byFixtureAndMarket
     */
    public function preMatchOddsByMarket(int $marketId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture_id set');
        return (new OddsPreMatch())->byFixtureAndMarket($this->id, $marketId, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see OddsInplay::byFixture
     */
    public function inplayOdds(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture_id set');
        return (new OddsInplay())->byFixture($this->id, $query);
    }

    /**
     * @param int $bookmakerId the id of the bookmaker
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see OddsInplay::byFixtureAndBookmaker()
     */
    public function inplayOddsByBookmaker(int $bookmakerId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture_id set');
        return (new OddsInplay())->byFixtureAndBookmaker($this->id, $bookmakerId, $query);
    }

    /**
     * @param int $marketId the id of the market
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see OddsInplay::byFixtureAndMarket
     */
    public function inplayOddsByMarket(int $marketId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture_id set');
        return (new OddsInplay())->byFixtureAndMarket($this->id, $marketId, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see OddsPremium::byFixture
     */
    public function premiumOdds(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture_id set');
        return (new OddsPremium())->byFixture($this->id, $query);
    }

    /**
     * @param int $bookmakerId the id of the bookmaker
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see OddsPremium::byFixtureAndBookmaker
     */
    public function premiumOddsByBookmaker(int $bookmakerId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture_id set');
        return (new OddsPremium())->byFixtureAndBookmaker($this->id, $bookmakerId, $query);
    }

    /**
     * @param int $marketId the id of the market
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see OddsPremium::byFixtureAndMarket
     */
    public function premiumOddsByMarket(int $marketId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture_id set');
        return (new OddsPremium())->byFixtureAndMarket($this->id, $marketId, $query);
    }
}
