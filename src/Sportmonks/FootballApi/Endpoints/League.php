<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues
 */
class League extends FootballApiClient
{
    protected ?int $id;

    /**
     * @param int|null $id  the team id
     */
    public function __construct(?int $id = null)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * Returns all the leagues available within your subscription
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('leagues', $params);
    }

    /**
     * Returns information from your requested league ID.
     *
     * @param   int     $id     the league id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("leagues/$id", $params);
    }

    /**
     * Returns all the leagues with fixtures that are currently being played.
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function live(array $params = []): object
    {
        return $this->call('leagues/live', $params);
    }

    /**
     * Returns all the leagues with fixtures from your requested fixture date.
     *
     * @param   string  $date   the date
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byDate(string $date, array $params = []): object
    {
        return $this->call("leagues/fixtures/date/$date", $params);
    }

    /**
     * Returns all the leagues from your requested country ID.
     *
     * @param   int     $countryId  the country id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byCountry(int $countryId, array $params = []): object
    {
        return $this->call("leagues/countries/$countryId", $params);
    }

    /**
     * Returns all the leagues that match your search query.
     *
     * @param   string  $name   the league name to search
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function search(string $name, array $params = []): object
    {
        return $this->call("leagues/search/$name", $params);
    }

    /**
     * Returns the transfers from your requested league ID.
     *
     * @alias
     * @see     Transfer::byLeague()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function transfers(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No league ID set');
        return (new Transfer())->byLeague($this->id, $params);
    }
}
