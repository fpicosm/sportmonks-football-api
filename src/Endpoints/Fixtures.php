<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Fixtures extends FootballClient
{
    /** @var int|NULL the fixture id */
    protected ?int $id;

    /**
     * @param  int|NULL  $id  the fixture id
     */
    public function __construct (int $id = NULL)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-all-fixtures Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('fixtures', $query);
    }

    /**
     * @param  int    $id     the fixture id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixture-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("fixtures/$id", $query);
    }

    /**
     * @param  string|array  $ids    the fixture ids
     * @param  array         $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-multiple-ids Docs
     */
    public function byMultipleIds (string|array $ids, array $query = []) : object
    {
        if (is_array($ids)) $ids = join(',', $ids);
        return $this->call("fixtures/$ids", $query);
    }

    /**
     * @param  string  $date   the date (YYYY-MM-DD)
     * @param  array   $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date Docs
     */
    public function byDate (string $date, array $query = []) : object
    {
        return $this->call("fixtures/date/$date", $query);
    }

    /**
     * @param  string  $from   the start date (YYYY-MM-DD)
     * @param  string  $to     the end date (YYYY-MM-DD)
     * @param  array   $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range Docs
     */
    public function byDateRange (string $from, string $to, array $query = []) : object
    {
        return $this->call("fixtures/between/$from/$to", $query);
    }

    /**
     * @param  string  $from    the start date (YYYY-MM-DD)
     * @param  string  $to      the end date (YYYY-MM-DD)
     * @param  int     $teamId  the team id
     * @param  array   $query   the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range-for-team Docs
     */
    public function byDateRangeForTeam (string $from, string $to, int $teamId, array $query = []) : object
    {
        return $this->call("fixtures/between/$from/$to/$teamId", $query);
    }

    /**
     * @param  int    $firstTeamId   the first team id
     * @param  int    $secondTeamId  the second team id
     * @param  array  $query         the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-head-to-head Docs
     */
    public function headToHead (int $firstTeamId, int $secondTeamId, array $query = []) : object
    {
        return $this->call("fixtures/head-to-head/$firstTeamId/$secondTeamId", $query);
    }

    /**
     * @param  string  $teamName  the team name
     * @param  array   $query     the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-head-to-head Docs
     */
    public function search (string $teamName, array $query = []) : object
    {
        return $this->call("fixtures/search/$teamName", $query);
    }

    /**
     * @param  int    $marketId  the market id
     * @param  array  $query     the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-upcoming-fixtures-by-market-id Docs
     */
    public function upcomingByMarketId (int $marketId, array $query = []) : object
    {
        return $this->call("fixtures/upcoming/markets/$marketId", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-latest-updated-fixtures Docs
     */
    public function latest (array $query = []) : object
    {
        return $this->call('fixtures/latest', $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations/get-tv-stations-by-fixture-id Docs
     */
    public function tvStations (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture_id set');
        return $this->call("tv-stations/fixtures/$this->id", $query);
    }
}