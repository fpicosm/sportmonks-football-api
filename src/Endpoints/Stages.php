<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Stages extends FootballClient
{
    /** @var int|null the stage id */
    protected ?int $id;

    /**
     * @param int|null $id the stage id
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
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-all-stages Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('stages', $query);
    }

    /**
     * @param int $id the stage id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stage-by-id Docs
     */
    public function find(int $id, array $query = []): object
    {
        return $this->call("stages/$id", $query);
    }

    /**
     * @param int $seasonId the season id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stages-by-season-id Docs
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->call("stages/seasons/$seasonId", $query);
    }

    /**
     * @param string $name the stage name
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stages-by-search-by-name Docs
     */
    public function search(string $name, array $query = []): object
    {
        return $this->call("stages/search/$name", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-stage-id Docs
     * @see  Topscorers::byStage
     */
    public function topscorers(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No stage_id set');
        return (new Topscorers())->byStage($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/statistics/get-stage-statistics-by-id
     * @see Statistics::byStage()
     */
    public function statistics(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No stage_id set');
        return (new Statistics())->byStage($this->id, $query);
    }
}
