<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\FootballApiClient;

class Seasons extends FootballApiClient
{
    /**
     * @var int|null the season id
     */
    protected ?int $id;

    /**
     * @param  int|null  $id  the season id
     */
    public function __construct (?int $id = NULL)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function all (array $query = []) : object
    {
        return $this->call('seasons', $query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $id     the season id
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function find (int $id, array $query = []) : object
    {
        return $this->call("seasons/$id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function news (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("news/seasons/$this->id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function rounds (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("rounds/season/$this->id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $teamId  the team id
     * @param  array  $query   the query params
     *
     * @throws GuzzleException
     */
    public function squad (int $teamId, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("squad/season/$this->id/team/$teamId", $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function stages (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("stages/season/$this->id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  bool   $live   returns live (or not) standings
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function standings (bool $live = false, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');

        $endpoint = $live ? "standings/season/live/$this->id" : "standings/season/$this->id";
        return $this->call($endpoint, $query);
    }

    /**
     * @return object the response object
     *
     * @param  string  $date   limit date (YYYY-MM-DD)
     * @param  array   $query  the query params
     *
     * @throws GuzzleException
     */
    public function standingsByDate (string $date, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("standings/season/$this->id/date/$date", $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function standingsCorrection (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("corrections/season/$this->id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function teams (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("teams/season/$this->id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  bool   $aggregated  show (or not) aggregated
     * @param  array  $query       the query params
     *
     * @throws GuzzleException
     */
    public function topscorers (bool $aggregated = false, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');

        $endpoint = $aggregated ? "topscorers/season/$this->id/aggregated" : "topscorers/season/$this->id";
        return $this->call($endpoint, $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function venues (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("venues/season/$this->id", $query);
    }
}
