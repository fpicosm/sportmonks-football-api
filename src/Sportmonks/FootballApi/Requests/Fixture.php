<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * There are multiple options to retrieve the fixtures within your subscription.
 * The fixtures’ endpoints are divided into 8 categories.
 * Per endpoint, you can find the details, including base URL, parameters, include options and more.
 *
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
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-all-fixtures
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
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixture-by-id
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
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixtures-by-multiple-ids
     * @param   string|array    $ids    an array or comma separated string
     * @param   array           $params the query params
     * @return  object          the response object
     * @throws  GuzzleException
     */
    public function byIds(string|array $ids, array $params = []): object
    {
        if (is_array($ids)) $ids = join(',', $ids);
        return $this->call("fixtures/multi/$ids", $params);
    }

    /**
     * Returns the fixtures you’ve requested by IDs.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixture-by-date-range
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
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixtures-by-date
     * @param   string  $date   a valid date
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
     * @see     Team::fixturesByDateRange()
     * @param   int     $teamId a valid id from teams endpoint
     * @param   string  $start  the start date
     * @param   string  $end    the end date
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byDateRangeForTeam(int $teamId, string $start, string $end, array $params = []): object
    {
        return (new Team($teamId))->fixturesByDateRange($start, $end, $params);
    }

    /**
     * Returns the head-to-head fixtures of two teams you’ve requested.
     *
     * @see     Team::headToHead()
     * @param   int     $firstTeamId    a valid id from teams endpoint
     * @param   int     $secondTeamId   a valid id from teams endpoint
     * @param   array   $params         the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function headToHead(int $firstTeamId, int $secondTeamId, array $params = []): object
    {
        return (new Team($firstTeamId))->headToHead($secondTeamId, $params);
    }

    /**
     * Returns you all the games that have received updates within 2 hours.

     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-last-updated-fixtures
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
     * @see     TvStation::byFixture()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/tv-stations/get-tv-station-by-fixture-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function tvStations(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture ID set');
        return $this->call("tv-stations/fixtures/$this->id", $params);
    }

    /**
     * Returns a textual representation from the requested fixture ID.
     *
     * @see     Commentary::byFixture()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/commentaries/get-commentaries-by-fixture-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function commentaries(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture ID set');
        return $this->call("commentaries/fixtures/$this->id", $params);
    }

    /**
     * Returns video highlights, goals, events etc.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/video-highlights/get-video-highlights-by-fixture-id
     * @see     Highlight::byFixture()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function highlights(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture ID set');
        return $this->call("highlights/fixtures/$this->id", $params);
    }

    /**
     * This endpoint returns all the predictions available for your requested fixture ID.
     *
     * @see     Prediction::byFixture()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/predictions/get-probabilities-by-fixture-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function predictions(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No fixture ID set');
        return $this->call("predictions/probabilities/fixtures/$this->id", $params);
    }
}
