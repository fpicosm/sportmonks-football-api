<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
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
     * Returns all the teams available within your subscription.
     *
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
     * @param   int     $countryId  the country id
     * @param   array   $params     the query params
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
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function bySeason(int $seasonId, array $params = []): object
    {
        return $this->call("teams/seasons/$seasonId", $params);
    }

    /**
     * Returns all the teams that match your search query.
     *
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
     * @alias
     * @see     Squad::byTeam()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function squad(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');
        return (new Squad())->byTeam($this->id, $params);
    }

    /**
     * Returns (historical) squads from your requested season ID.
     *
     * @alias
     * @see     Squad::byTeamAndSeason()
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function seasonSquad(int $seasonId, array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');
        return (new Squad())->byTeamAndSeason($this->id, $seasonId);
    }

    /**
     * Returns the fixtures you’ve requested by date range for a specific team.
     *
     * @alias
     * @see     Fixture::byDateRangeForTeam()
     * @param   string  $start  the start date
     * @param   string  $end    the end date
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function fixturesByDateRange(string $start, string $end, array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');
        return (new Fixture())->byDateRangeForTeam($this->id, $start, $end, $params);
    }

    /**
     * Returns the head-to-head fixtures of two teams you’ve requested.
     *
     * @alias
     * @see     Fixture::headToHead()
     * @param   int     $opponentId a valid team id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function headToHead(int $opponentId, array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');
        return (new Fixture())->headToHead($this->id, $opponentId, $params);
    }

    /**
     * Returns the transfers from your requested team ID.
     *
     * @alias
     * @see     Transfer::byTeam()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function transfers(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');
        return (new Transfer())->byTeam($this->id, $params);
    }

    /**
     * Returns the complete season schedule for one specific team from your requested season ID.
     *
     * @alias
     * @see     Schedule::bySeasonAndTeam()
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function seasonSchedules(int $seasonId, array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');
        return (new Schedule())->bySeasonAndTeam($seasonId, $this->id, $params);
    }

    /**
     * Returns the rivals of your requested team ID (if available).
     *
     * @alias
     * @see     Rival::byTeam()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function rivals(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');
        return (new Rival())->byTeam($this->id, $params);
    }
}
