<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\FootballApiClient;

/**
 * Retrieve detailed team information via one of our team endpoints.
 * With the team endpoints, you can retrieve basic information like logos, names etc.
 * You can retrieve more detailed information by using the correct includes.
 * Per endpoint, you can find the details including base URL, parameters, includes and more.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams
 */
class Team extends FootballApiClient
{
    protected ?int $id;

    /**
     * @param int|null $id  the team id
     */
    public function __construct(?int $id)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * Returns all the teams available within your subscription
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-all-teams
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('teams', $params);
    }

    /**
     * Returns information from your requested team ID.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-by-id
     * @param   int     $id     the team id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("teams/{$id}", $params);
    }

    /**
     * Returns the teams from your requested country id.
     *
     * @see     Country
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-by-id
     * @param   int     $countryId  a valid country id from countries endpoint
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byCountry(int $countryId, array $params = []): object
    {
        return $this->call("teams/countries/{$countryId}", $params);
    }

    /**
     * Returns the teams from your requested season id.
     *
     * @see     Season
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-by-season-id
     * @param   int     $seasonId   a valid season id from seasons endpoint
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function bySeason(int $seasonId, array $params = []): object
    {
        return $this->call("teams/seasons/{$seasonId}", $params);
    }

    /**
     * Returns all the teams that match your search query.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/search-team-by-name
     * @param   string  $name   the team name to search
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function search(string $name, array $params = []): object
    {
        return $this->call("teams/search/{$name}", $params);
    }

    /**
     * Returns all the current and historical leagues from your requested team id.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-all-leagues-by-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function leagues(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');

        return $this->call("teams/{$this->id}/leagues", $params);
    }

    /**
     * Returns all the current leagues of your requested team id.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-current-leagues-by-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function currentLeagues(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');

        return $this->call("teams/{$this->id}/leagues/current", $params);
    }

    /**
     * Returns the current domestic squad from your requested team ID.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads/get-team-squads-by-team-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function squad(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');

        return $this->call("squads/teams/{$this->id}", $params);
    }

    /**
     * Returns the current domestic squad from your requested team ID.
     *
     * @see     Season
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads/get-team-squads-by-team-id
     * @param   int     $seasonId   a valid season id from seasons endpoint
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function squadBySeason(int $seasonId, array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team ID set');

        return $this->call("squads/seasons/{$seasonId}/teams/{$this->id}", $params);
    }
}
