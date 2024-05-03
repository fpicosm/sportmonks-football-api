<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Squads extends FootballClient
{
    /**
     * @param int $teamId the team id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads/get-team-squad-by-team-id Docs
     */
    public function byTeam(int $teamId, array $query = []): object
    {
        return $this->call("squads/teams/$teamId", $query);
    }

    /**
     * @param int $teamId the team id
     * @param int $seasonId the season id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads/get-team-squad-by-team-and-season-id Docs
     */
    public function byTeamAndSeason(int $teamId, int $seasonId, array $query = []): object
    {
        return $this->call("squads/seasons/$seasonId/teams/$teamId", $query);
    }

    /**
     * @param int $teamId the id of the team
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads/get-extended-team-squad-by-team-id Docs
     */
    public function extendedByTeam(int $teamId, array $query = []): object
    {
        return $this->call("squads/teams/$teamId/extended", $query);
    }
}
