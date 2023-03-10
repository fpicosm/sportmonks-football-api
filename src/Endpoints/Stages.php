<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Stages extends FootballClient
{
    /** @var int|NULL the stage id */
    protected ?int $id;

    /**
     * @param  int|NULL  $id  the stage id
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
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-all-stages Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('stages', $query);
    }

    /**
     * @param  int    $id     the stage id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stage-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("stages/$id", $query);
    }

    /**
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stages-by-season-id Docs
     */
    public function bySeasonId (int $seasonId, array $query = []) : object
    {
        return $this->call("stages/seasons/$seasonId", $query);
    }

    /**
     * @param  string  $name   the stage name
     * @param  array   $query  the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stages-by-search-by-name Docs
     */
    public function search (string $name, array $query = []) : object
    {
        return $this->call("stages/search/$name", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-stage-id Docs
     */
    public function topscorers (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No stage_id set');
        return $this->call("topscorers/stages/$this->id", $query);
    }
}