<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * Retrieve detailed team information via one of our team endpoints.
 * With the team endpoints, you can retrieve basic information like logos, names etc.
 * You can retrieve more detailed information by using the correct includes.
 * Per endpoint, you can find the details including base URL, parameters, includes and more.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams
 */
class Team extends FootballApiClient
{
    protected ?int $id;

    /**
     * @param int|null $id  the team id
     */
    public function __construct(?int $id = null)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * Returns all the teams available within your subscription
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-all-teams
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('teams', $params);
    }

    /**
     * Returns information from your requested team ID.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-by-id
     * @param   int     $id     the team id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("teams/$id", $params);
    }

    /**
     * Returns the teams from your requested country id.
     *
     * @see     Country::teams()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-by-id
     * @param   int     $countryId  a valid country id from countries endpoint
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byCountry(int $countryId, array $params = []): object
    {
        return $this->call("teams/countries/$countryId", $params);
    }

    /**
     * Returns the teams from your requested season id.
     *
     * @see     Season::teams()
     * @param   int     $seasonId   a valid season id from seasons endpoint
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function bySeason(int $seasonId, array $params = []): object
    {
        return (new Season($seasonId))->teams($params);
    }

    /**
     * Returns all the teams that match your search query.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/search-team-by-name
     * @param   string  $name   the team name to search
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function search(string $name, array $params = []): object
    {
        return $this->call("teams/search/$name", $params);
    }

    /**
     * Returns all the current and historical leagues from your requested team id.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-all-leagues-by-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function leagues(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');

        return $this->call("teams/$this->id/leagues", $params);
    }

    /**
     * Returns all the current leagues of your requested team id.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-current-leagues-by-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function currentLeagues(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');

        return $this->call("teams/$this->id/leagues/current", $params);
    }

    /**
     * Returns the current domestic squad from your requested team ID.
     *
     * @see     TeamSquad::byTeam()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads/get-team-squads-by-team-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function squad(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');

        return $this->call("squads/teams/$this->id", $params);
    }

    /**
     * Returns (historical) squads from your requested season ID.
     *
     * @see     Season::teamSquad()
     * @param   int     $seasonId   a valid season id from seasons endpoint
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function squadBySeason(int $seasonId, array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');

        return (new Season($seasonId))->teamSquad($this->id, $params);
    }

    /**
     * Returns the fixtures you’ve requested by date range for a specific team.
     *
     * @see     Fixture::byDateRangeForTeam()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixture-by-date-range-for-team
     * @param   string  $start  the start date
     * @param   string  $end    the end date
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function fixturesByDateRange(string $start, string $end, array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');
        return $this->call("fixtures/between/$start/$end/$this->id", $params);
    }

    /**
     * Returns the head-to-head fixtures of two teams you’ve requested.
     *
     * @see     Fixture::headToHead()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixture-by-head-to-head
     * @param   int     $opponentId a valid team id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function headToHead(int $opponentId, array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');
        return $this->call("fixtures/head-to-head/$this->id/$opponentId", $params);
    }

    /**
     * Returns the transfers from your requested team ID.
     *
     * @see     Transfer::byTeam()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-transfers-by-team-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function transfers(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');
        return $this->call("transfers/teams/$this->id", $params);
    }

    /**
     * Returns the complete season schedule for one specific team from your requested season ID.
     *
     * @see     Season::teamSchedule()
     * @see     Schedule::bySeasonAndTeam()
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function seasonSchedule(int $seasonId, array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');
        return (new Season($seasonId))->teamSchedule($this->id, $params);
    }

    /**
     * This endpoint returns the rivals of your requested team ID (if available).
     *
     * @see     Rival::byTeam()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rivals/get-rivals-by-team-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function rivals(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');
        return $this->call("teams/rivals/$this->id", $params);
    }
}
