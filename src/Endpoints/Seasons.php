<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Seasons extends FootballClient
{
    /** @var int|NULL the season id */
    protected ?int $id;

    /**
     * @param  int|NULL  $id  the season id
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
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-all-seasons Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('seasons', $query);
    }

    /**
     * @param  int    $id     the season id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-seasons-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("seasons/$id", $query);
    }

    /**
     * @param  int    $teamId  the team id
     * @param  array  $query   the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-seasons-by-team-id Docs
     */
    public function byTeamId (int $teamId, array $query = []) : object
    {
        return $this->call("seasons/teams/$teamId", $query);
    }

    /**
     * @param  string  $name   the season year to search (YYYY)
     * @param  array   $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-seasons-by-search-by-name Docs
     */
    public function search (string $name, array $query = []) : object
    {
        return $this->call("seasons/search/$name", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id Docs
     * @see  Schedules::bySeasonId
     */
    public function schedules (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Schedules())->bySeasonId($this->id, $query);
    }

    /**
     * @param  int    $teamId
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id-and-team-id Docs
     * @see  Schedules::bySeasonAndTeamId
     */
    public function schedulesByTeamId (int $teamId, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Schedules())->bySeasonAndTeamId($this->id, $teamId, $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stages-by-season-id Docs
     * @see  Stages::bySeasonId
     */
    public function stages (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Stages())->bySeasonId($this->id, $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-rounds-by-season-id Docs
     * @see  Rounds::bySeasonId
     */
    public function rounds (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Rounds())->bySeasonId($this->id, $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standings-by-season-id Docs
     * @see  Standings::bySeasonId
     */
    public function standings (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Standings())->bySeasonId($this->id, $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standing-correction-by-season-id Docs
     * @see  Standings::correctionBySeasonId
     */
    public function standingsCorrection (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Standings())->correctionBySeasonId($this->id, $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-season-id Docs
     * @see  Topscorers::bySeasonId
     */
    public function topscorers (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Topscorers())->bySeasonId($this->id, $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-season-id Docs
     * @see  Teams::bySeasonId
     */
    public function teams (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Teams())->bySeasonId($this->id, $query);
    }

    /**
     * @param  int    $teamId  the team id
     * @param  array  $query   the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads/get-team-squad-by-team-and-season-id Docs
     * @see  Squads::byTeamAndSeasonId
     */
    public function squadsByTeamId (int $teamId, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Squads())->byTeamAndSeasonId($teamId, $this->id, $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues/get-venues-by-season-id Docs
     * @see  Venues::bySeasonId
     */
    public function venues (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Venues())->bySeasonId($this->id, $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/news/get-pre-match-news-by-season-id Docs
     * @see  News::bySeasonId
     */
    public function news (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new News())->bySeasonId($this->id, $query);
    }
}
