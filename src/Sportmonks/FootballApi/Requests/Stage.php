<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

/**
 * The stages' endpoint can help you define the structure of the league.
 * A league can have different types of stages. For example: regular season, promotion-play off, knock-outs etc.
 * With the stages' endpoint, we give you the ability to request data for a single stage or for a whole season.
 * Per endpoint, you can find the details, including base URL, parameters, includes and more.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/stages
 */
class Stage extends FootballApiClient
{
    /**
     * Returns all stages available within your subscription
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/stages/get-all-stages
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('stages', $params);
    }

    /**
     * Returns stage information from your requested stage ID.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/stages/get-stages-by-id
     * @param   int     $id     the stage id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("stages/$id", $params);
    }

    /**
     * Returns stage information from your requested season ID.
     *
     * @see     Season::stages()
     * @param   int     $seasonId   a valid id from seasons endpoint
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function bySeason(int $seasonId, array $params = []): object
    {
        return (new Season($seasonId))->stages($params);
    }
}
