<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Topscorers extends FootballClient
{
    /**
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-season-id Docs
     */
    public function bySeasonId (int $seasonId, array $query = []) : object
    {
        return $this->call("topscorers/seasons/$seasonId", $query);
    }

    /**
     * @param  int    $stageId  the stage id
     * @param  array  $query    the query params
     * @throws GuzzleException
     * @return object the response object
     *
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-stage-id Docs
     */
    public function byStageId (int $stageId, array $query = []) : object
    {
        return $this->call("topscorers/stages/$stageId", $query);
    }
}