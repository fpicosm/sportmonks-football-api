<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\FootballApiClient;

class Fixtures extends FootballApiClient
{
    /**
     * @var int|null the fixture id
     */
    protected ?int $id;

    /**
     * @param  int|null  $id  the fixture id
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
    public function bookmakers (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("bookmakers/fixture/$this->id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  string  $date   fixture date (YYYY-MM-DD)
     * @param  array   $query  the query params
     *
     * @throws GuzzleException
     */
    public function byDate (string $date, array $query = []) : object
    {
        return $this->call("fixtures/date/$date", $query);
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
    public function byDateRange (string $startDate,
                                 string $endDate,
                                 array  $query = []) : object
    {
        return $this->call("fixtures/between/$startDate/$endDate", $query);
    }

    /**
     * @return object the response object
     *
     * @param  string  $startDate  starting date (YYYY-MM-DD)
     * @param  string  $endDate    ending date (YYYY-MM-DD)
     * @param  int     $teamId     the team id
     * @param  array   $query      the query params
     *
     * @throws GuzzleException
     */
    public function byDateRangeForTeam (string $startDate,
                                        string $endDate,
                                        int    $teamId,
                                        array  $query = []) : object
    {
        return $this->call("fixtures/between/$startDate/$endDate/$teamId", $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function commentaries (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("commentaries/fixture/$this->id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function deleted (array $query = []) : object
    {
        return $this->call('fixtures/deleted', $query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $id     the fixture id
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function find (int $id, array $query = []) : object
    {
        return $this->call("fixtures/$id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function highlights (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("highlights/fixture/$this->id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function lastUpdated (array $query = []) : object
    {
        return $this->call('fixtures/updates', $query);
    }

    /**
     * @return object the response object
     *
     * @param  string|array  $list   the fixture id's list
     * @param  array         $query  the query params
     *
     * @throws GuzzleException
     */
    public function multiple (string|array $list, array $query = []) : object
    {
        if (is_array($list)) $list = join(',', $list);
        return $this->call("fixtures/multi/$list", $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function tvStations (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("tvstations/fixture/$this->id", $query);
    }
}
