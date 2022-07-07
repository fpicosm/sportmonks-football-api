<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

/**
 * Display complete season schedules for your favourites leagues and teams.
 * The schedule endpoints allow you to retrieve the up-to-date season schedules that have your interest quickly.
 * You can choose a variety of endpoints to retrieve the season schedules.
 * Per endpoint, you can find the details, including base URL, parameters, includes and more.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/schedules
 */
class Schedule extends FootballApiClient
{
    /**
     * Returns the complete season schedule from your requested season ID.
     *
     * @see     Season::schedules()
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function bySeason(int $seasonId, array $params = []): object
    {
        return (new Season($seasonId))->schedules($params);
    }

    /**
     * Returns the complete season schedule for one specific team from your requested season ID.
     *
     * @see     Season::schedules()
     * @param   int     $seasonId   the season id
     * @param   int     $teamId     the team id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function bySeasonAndTeam(int $seasonId, int $teamId, array $params = []): object
    {
        return (new Season($seasonId))->teamSchedule($teamId, $params);
    }
}
