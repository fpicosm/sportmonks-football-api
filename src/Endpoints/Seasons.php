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
     */
    public function schedules (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return $this->call("schedules/seasons/$this->id", $query);
    }

    /**
     * @param  int    $teamId
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id-and-team-id Docs
     */
    public function schedulesByTeamId (int $teamId, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return $this->call("schedules/seasons/$this->id/teams/$teamId", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stages-by-season-id Docs
     */
    public function stages (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return $this->call("stages/seasons/$this->id", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-rounds-by-season-id Docs
     */
    public function rounds (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return $this->call("rounds/seasons/$this->id", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standings-by-season-id Docs
     */
    public function standings (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return $this->call("standings/seasons/$this->id", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standing-correction-by-season-id Docs
     */
    public function standingsCorrection (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return $this->call("standings/corrections/seasons/$this->id", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-season-id Docs
     */
    public function topscorers (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return $this->call("topscorers/seasons/$this->id", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-season-id Docs
     */
    public function teams (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return $this->call("teams/seasons/$this->id", $query);
    }

    /**
     * @param  int    $teamId  the team id
     * @param  array  $query   the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads/get-team-squad-by-team-and-season-id Docs
     */
    public function squadsByTeamId (int $teamId, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return $this->call("squads/seasons/$this->id/teams/$teamId", $query);
    }
}