<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Rounds extends FootballClient
{
    /** @var int|null the round id */
    protected ?int $id;

    /**
     * @param int|null $id the round id
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
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-all-rounds Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('rounds', $query);
    }

    /**
     * @param int $id the round id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-round-by-id Docs
     */
    public function find(int $id, array $query = []): object
    {
        return $this->call("rounds/$id", $query);
    }

    /**
     * @param int $seasonId the season id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-rounds-by-season-id Docs
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->call("rounds/seasons/$seasonId", $query);
    }

    /**
     * @param string $name the round name
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-rounds-by-search-by-name Docs
     */
    public function search(string $name, array $query = []): object
    {
        return $this->call("rounds/search/$name", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standings-by-round-id Docs
     * @see  Standings::byRound
     */
    public function standings(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No round_id set');
        return (new Standings())->byRound($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/statistics/get-round-statistics-by-id
     * @see  Statistics::byRound
     */
    public function statistics(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No round_id set');
        return (new Statistics())->byRound($this->id, $query);
    }
}
