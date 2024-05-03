<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Players extends FootballClient
{
    /** @var int|null the player id */
    protected ?int $id;

    /**
     * @param int|null $id the player id
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
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-all-players Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('players', $query);
    }

    /**
     * @param int $id the player id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-player-by-id Docs
     */
    public function find(int $id, array $query = []): object
    {
        return $this->call("players/$id", $query);
    }

    /**
     * @param int $countryId the country id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-players-by-country-id Docs
     */
    public function byCountry(int $countryId, array $query = []): object
    {
        return $this->call("players/countries/$countryId", $query);
    }

    /**
     * @param string $name the player name to search
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-players-by-search-by-name Docs
     */
    public function search(string $name, array $query = []): object
    {
        return $this->call("players/search/$name", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-last-updated-players Docs
     */
    public function lastUpdated(array $query = []): object
    {
        return $this->call('players/latest', $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-by-player-id Docs
     * @see  Transfers::byPlayer
     */
    public function transfers(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No player_id set');
        return (new Transfers())->byPlayer($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see Statistics::playersBySeason()
     */
    public function statisticsBySeason(int $seasonId, array $query = []): object
    {
        return (new Statistics())->playersBySeason($seasonId, $query);
    }
}
