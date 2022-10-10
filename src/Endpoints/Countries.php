<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\FootballApiClient;

class Countries extends FootballApiClient
{
    /**
     * @var int|null the country id
     */
    protected ?int $id;

    /**
     * @param  int|null  $id  the country id
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
        return $this->call('countries', $query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $id     the country id
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function find (int $id, array $query = []) : object
    {
        return $this->call("countries/$id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function leagues (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("countries/$this->id/leagues", $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function players (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("countries/$this->id/players", $query);
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
        return $this->call("countries/$this->id/teams", $query);
    }
}
