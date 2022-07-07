<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * Nothing is better than a good rivalry!
 * Do you want to be able to show the biggest rivalries and the hottest derby days?
 * Think about 'The Old Firm' or ‘The Super clásico’ and 'The Merseyside Derby'.
 * You will be able to show all rivals every club has with these rivals' endpoint.
 * Use one of our 2 rivals endpoints.
 * Per endpoint, you can find the details, including base URL, parameters, includes and more.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rivals
 */
class Rival extends FootballApiClient
{
    /**
     * This endpoint returns all the teams within your subscription with the rivals' information (if available).
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rivals/get-all-rivals
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('rivals', $params);
    }

    /**
     * This endpoint returns the rivals of your requested team ID (if available).
     *
     * @see     Team::rivals()
     * @param   int     $teamId the team id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byTeam(int $teamId, array $params = []): object
    {
        return (new Team($teamId))->rivals($params);
    }
}
