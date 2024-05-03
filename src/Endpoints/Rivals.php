<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Rivals extends FootballClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rivals/get-all-rivals Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('rivals', $query);
    }

    /**
     * @param int $teamId the team id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rivals/get-rivals-by-team-id Docs
     */
    public function byTeam(int $teamId, array $query = []): object
    {
        return $this->call("rivals/teams/$teamId", $query);
    }
}
