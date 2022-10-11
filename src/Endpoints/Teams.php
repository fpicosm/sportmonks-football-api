<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\FootballApiClient;

class Teams extends FootballApiClient
{
    /**
     * @var int|null the team id
     */
    protected ?int $id;

    /**
     * @param  int|null  $id  the team id
     */
    public function __construct (?int $id = NULL)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * @return object the response object
     *
     * @param  int    $id     the team id
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function find (int $id, array $query = []) : object
    {
        return $this->call("teams/$id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  string  $startDate  starting date (YYYY-MM-DD)
     * @param  string  $endDate    ending date (YYYY-MM-DD)
     * @param  array   $query      the query params
     *
     * @throws GuzzleException
     */
    public function fixturesByDateRange (string $startDate,
                                        string $endDate,
                                        array  $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("fixtures/between/$startDate/$endDate/$this->id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $teamId  the rival team id
     * @param  array  $query   the query params
     *
     * @throws GuzzleException
     * @see Seasons::squad()
     */
    public function headToHead (int $teamId, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("head2head/$this->id/$teamId", $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function leagues (bool $all = false, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');

        $endpoint = $all ? "teams/$this->id/history" : "teams/$this->id/current";
        return $this->call($endpoint, $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function rivals (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');

        return $this->call("teams/$this->id/rivals", $query);
    }

    /**
     * @return object the response object
     *
     * @param  string  $name   the team name to search
     * @param  array   $query  the query params
     *
     * @throws GuzzleException
     */
    public function search (string $name, array $query = []) : object
    {
        return $this->call("teams/search/$name", $query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     *
     * @throws GuzzleException
     * @see Seasons::squad()
     */
    public function squad (int $seasonId, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return (new Seasons($seasonId))->squad($this->id, $query);
    }
}
