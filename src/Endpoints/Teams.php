<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Teams extends FootballClient
{
    /** @var int|null the team id */
    protected ?int $id;

    /**
     * @param int|null $id the team id
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
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-all-teams Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('teams', $query);
    }

    /**
     * @param int $id the team id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-team-by-id Docs
     */
    public function byId(int $id, array $query = []): object
    {
        return $this->call("teams/$id", $query);
    }

    /**
     * @param int $countryId the country id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-country-id Docs
     */
    public function byCountryId(int $countryId, array $query = []): object
    {
        return $this->call("teams/countries/$countryId", $query);
    }

    /**
     * @param int $seasonId the season id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-season-id Docs
     */
    public function bySeasonId(int $seasonId, array $query = []): object
    {
        return $this->call("teams/seasons/$seasonId", $query);
    }

    /**
     * @param string $name the team name to search
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-search-by-name Docs
     */
    public function search(string $name, array $query = []): object
    {
        return $this->call("teams/search/$name", $query);
    }

    /**
     * @param string $from the start date (YYYY-MM-DD)
     * @param string $to the end date (YYYY-MM-DD)
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range-for-team Docs
     * @see  Fixtures::byDateRangeForTeam
     */
    public function fixturesByDateRange(string $from, string $to, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Fixtures())->byDateRangeForTeam($from, $to, $this->id, $query);
    }

    /**
     * @param int $opponentId the opponent id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-head-to-head Docs
     * @see  Fixtures::headToHead
     */
    public function headToHead(int $opponentId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Fixtures())->headToHead($this->id, $opponentId, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-all-leagues-by-team-id Docs
     * @see  Leagues::allByTeamId
     */
    public function allLeagues(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Leagues())->allByTeamId($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-current-leagues-by-team-id Docs
     * @see  Leagues::currentByTeamId
     */
    public function currentLeagues(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Leagues())->currentByTeamId($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-team-id Docs
     * @see  Schedules::byTeamId
     */
    public function schedules(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Schedules())->byTeamId($this->id, $query);
    }

    /**
     * @param int $seasonId the season id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id-and-team-id Docs
     * @see  Schedules::bySeasonAndTeamId()
     */
    public function schedulesBySeasonId(int $seasonId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Schedules())->bySeasonAndTeamId($seasonId, $this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-seasons-by-team-id Docs
     * @see  Seasons::byTeamId
     */
    public function seasons(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Seasons())->byTeamId($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads/get-team-squad-by-team-id Docs
     * @see  Squads::byTeamId
     */
    public function squads(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Squads())->byTeamId($this->id, $query);
    }

    /**
     * @param int $seasonId the season id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads/get-team-squad-by-team-and-season-id Docs
     * @see  Squads::byTeamAndSeasonId
     */
    public function squadsBySeasonId(int $seasonId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Squads())->byTeamAndSeasonId($this->id, $seasonId, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-by-team-id Docs
     * @see  Transfers::byTeamId
     */
    public function transfers(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Transfers())->byTeamId($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rivals/get-rivals-by-team-id Docs
     * @see  Rivals::byTeamId
     */
    public function rivals(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Rivals())->byTeamId($this->id, $query);
    }
}
