<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rivals
 */
class Rival extends FootballApiClient
{
    /**
     * Returns all the teams within your subscription with the rivals' information (if available).
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('rivals', $params);
    }

    /**
     * Returns the rivals of your requested team ID (if available).
     *
     * @param   int     $teamId the team id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byTeam(int $teamId, array $params = []): object
    {
        return $this->call("teams/rivals/$teamId", $params);
    }
}
