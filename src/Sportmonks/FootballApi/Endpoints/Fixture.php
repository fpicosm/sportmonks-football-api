<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures
 */
class Fixture extends FootballApiClient
{
    protected ?int $id;

    public function __construct(?int $id = null)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * Returns all the fixtures accessible within your subscription.
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('fixtures', $params);
    }

    /**
     * Returns fixture information from your requested fixture ID.
     *
     * @param   int     $id     the fixture id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("fixtures/$id", $params);
    }

    /**
     * Returns the fixtures you’ve requested by IDs.
     *
     * @param   array   $ids    the fixture ids
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byIds(array $ids, array $params = []): object
    {
        $ids = join(',', $ids);
        return $this->call("fixtures/multi/$ids", $params);
    }

    /**
     * Returns the fixtures you’ve requested by date range.
     *
     * @param   string  $start  the start date
     * @param   string  $end    the end date
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byDateRange(string $start, string $end, array $params = []): object
    {
        return $this->call("fixtures/between/$start/$end", $params);
    }

    /**
     * Returns all the fixtures from your requested date.
     *
     * @param   string  $date   the date
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byDate(string $date, array $params = []): object
    {
        return $this->call("fixtures/date/$date", $params);
    }

    /**
     * Returns the fixtures you’ve requested by date range for a specific team.
     *
     * @param   int     $teamId the team id
     * @param   string  $start  the start date
     * @param   string  $end    the end date
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byDateRangeForTeam(int $teamId, string $start, string $end, array $params = []): object
    {
        return $this->call("fixtures/between/$start/$end/$teamId", $params);
    }

    /**
     * Returns the head-to-head fixtures of two teams you’ve requested.
     *
     * @param   int     $firstTeamId    the first team id
     * @param   int     $secondTeamId   the second team id
     * @param   array   $params         the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function headToHead(int $firstTeamId, int $secondTeamId, array $params = []): object
    {
        return $this->call("fixtures/head-to-head/$firstTeamId/$secondTeamId", $params);
    }

    /**
     * Returns you all the games that have received updates within 2 hours.
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function lastUpdated(array $params = []): object
    {
        return $this->call('fixtures/updates', $params);
    }

    /**
     * Returns all the TV Stations available for your requested fixture ID.
     *
     * @alias
     * @see     TvStation::byFixture()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function tvStations(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture ID set');
        return (new TvStation())->byFixture($this->id, $params);
    }

    /**
     * Returns a textual representation from the requested fixture ID.
     *
     * @alias
     * @see     Commentary::byFixture()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function commentaries(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture ID set');
        return (new Commentary())->byFixture($this->id, $params);
    }

    /**
     * Returns video highlights, goals, events etc.
     *
     * @alias
     * @see     Highlight::byFixture()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function highlights(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture ID set');
        return (new Highlight())->byFixture($this->id, $params);
    }

    /**
     * Returns all the predictions available for your requested fixture ID.
     *
     * @alias
     * @see     Prediction::byFixture()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function predictions(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture ID set');
        return (new Prediction())->byFixture($this->id, $params);
    }
}
