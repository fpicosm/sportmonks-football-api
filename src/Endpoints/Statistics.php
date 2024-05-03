<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;
use Sportmonks\FootballApi\Enums\StatisticsParticipant;

class Statistics extends FootballClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/statistics/get-season-statistics-by-participant Docs
     */
    public function playersBySeason(int $seasonId, array $query = []): object
    {
        return $this->call("statistics/seasons/players/$seasonId", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/statistics/get-season-statistics-by-participant Docs
     */
    public function teamsBySeason(int $seasonId, array $query = []): object
    {
        return $this->call("statistics/seasons/teams/$seasonId", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/statistics/get-season-statistics-by-participant Docs
     */
    public function coachesBySeason(int $seasonId, array $query = []): object
    {
        return $this->call("statistics/seasons/coaches/$seasonId", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/statistics/get-season-statistics-by-participant Docs
     */
    public function refereesBySeason(int $seasonId, array $query = []): object
    {
        return $this->call("statistics/seasons/referees/$seasonId", $query);
    }

    /**
     * @param int $stageId the id of the stage
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/statistics/get-stage-statistics-by-id Docs
     */
    public function byStage(int $stageId, array $query = []): object
    {
        return $this->call("statistics/stages/$stageId", $query);
    }

    /**
     * @param int $roundId the id of the round
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/statistics/get-round-statistics-by-id Docs
     */
    public function byRound(int $roundId, array $query = []): object
    {
        return $this->call("statistics/rounds/$roundId", $query);
    }
}
