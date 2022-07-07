<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

/**
 * Retrieve accurate information about the goals, assist and card topscorers.
 * The topscorers endpoint returns the top 25 players.
 * You can request the topscorers in total or by type: Goals, Cards or Assists.
 * Use one of our 2 topscorer endpoints.
 * Per endpoint, you can find the details, including base URL, parameters, includes and more
 *
 * This Topscorers endpoint returns the topscorers per stage of the season.
 * Please use the aggregated topscorers by season endpoint if you want an aggregated topscorer list
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/topscorers
 */
class TopScorer extends FootballApiClient
{
    /**
     * This endpoint returns all the topscorers per stage of the requested season.
     *
     * @see     Season::topScorers()
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function bySeason(int $seasonId, array $params = []): object
    {
        return (new Season($seasonId))->topScorers($params);
    }

    /**
     * This endpoint returns all the aggregated topscorers of the requested season.
     *
     * @see     Season::topScorersAggregated()
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function aggregatedBySeason(int $seasonId, array $params = []): object
    {
        return (new Season($seasonId))->topScorersAggregated($params);
    }
}
