<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Transfers extends FootballClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-all-transfers Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('transfers', $query);
    }

    /**
     * @param int $id the transfer id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfer-by-id Docs
     */
    public function byId(int $id, array $query = []): object
    {
        return $this->call("transfers/$id", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-latest-transfers Docs
     */
    public function latest(array $query = []): object
    {
        return $this->call('transfers/latest', $query);
    }

    /**
     * @param string $from start date (YYYY-MM-DD)
     * @param string $to end date (YYYY-MM-DD)
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-between-date-range Docs
     */
    public function byDateRange(string $from, string $to, array $query = []): object
    {
        return $this->call("transfers/between/$from/$to", $query);
    }

    /**
     * @param int $teamId the team id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-by-team-id Docs
     */
    public function byTeamId(int $teamId, array $query = []): object
    {
        return $this->call("transfers/teams/$teamId", $query);
    }

    /**
     * @param int $playerId the player id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-by-player-id Docs
     */
    public function byPlayerId(int $playerId, array $query = []): object
    {
        return $this->call("transfers/players/$playerId", $query);
    }
}
