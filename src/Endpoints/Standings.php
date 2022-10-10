<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class Standings extends FootballApiClient
{
    /**
     * @return object the response object
     *
     * @param  array  $query     the query params
     * @param  int    $seasonId  the season id
     * @param  int    $roundId   the round id
     *
     * @throws GuzzleException
     */
    public function byRound (int   $seasonId,
                             int   $roundId,
                             array $query = []) : object
    {
        return (new Seasons($seasonId))->roundStandings($roundId, $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query     the query params
     * @param  int    $seasonId  the season id
     *
     * @throws GuzzleException
     */
    public function bySeason (int $seasonId, array $query = []) : object
    {
        return (new Seasons($seasonId))->standings(false, $query);
    }

    /**
     * @return object the response object
     *
     * @param  int     $seasonId  the season id
     * @param  string  $date      limit date (YYYY-MM-DD)
     * @param  array   $query     the query params
     *
     * @throws GuzzleException
     */
    public function bySeasonAndDate (int    $seasonId,
                                     string $date,
                                     array  $query = []) : object
    {
        return (new Seasons($seasonId))->standingsByDate($date, $query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     *
     * @throws GuzzleException
     */
    public function correctionsBySeason (int $seasonId, array $query = []) : object
    {
        return (new Seasons($seasonId))->standingsCorrection($query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     *
     * @throws GuzzleException
     */
    public function liveBySeason (int $seasonId, array $query = []) : object
    {
        return (new Seasons($seasonId))->standings(true, $query);
    }
}
