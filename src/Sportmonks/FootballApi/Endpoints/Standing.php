<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * Keep track of the season performances of your favourite teams.
 * The standings' endpoint is used to retrieve full league standing tables.
 *
 * The response of the standings' endpoint can be returned in two formats depending on the league setup.
 * For ‘normal’ leagues, the response format differs from Cups.
 *
 * Please check your response carefully if you have cups and 'normal' Leagues in your plan.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings
 */
class Standing extends FootballApiClient
{
    /**
     * Returns all the standings available within your subscription.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-all-standings
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('standings', $params);
    }

    /**
     * Returns the full league standing table from your requested season ID.
     *
     * @see     Season::standings()
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function bySeason(int $seasonId, array $params = []): object
    {
        return (new Season($seasonId))->standings($params);
    }

    /**
     * Returns the full league standing table from your requested round ID.
     *
     * @see     Round::standings()
     * @param   int     $roundId    the round id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byRound(int $roundId, array $params = []): object
    {
        return (new Round($roundId))->standings($params);
    }

    /**
     * Returns the standing corrections from your requested season ID.
     *
     * @see     Season::standingCorrections()
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function correctionsBySeason(int $seasonId, array $params = []): object
    {
        return (new Season($seasonId))->standingCorrections($params);
    }
}
