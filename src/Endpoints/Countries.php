<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\CoreClient;

class Countries extends CoreClient
{
    /** @var int|null the country id */
    protected ?int $id;

    /**
     * @param int|null $id the country id
     */
    public function __construct(?int $id = null)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/countries/get-all-countries Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('countries', $query);
    }

    /**
     * @param int $id the country id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/countries/get-country-by-id Docs
     */
    public function find(int $id, array $query = []): object
    {
        return $this->call("countries/$id", $query);
    }

    /**
     * @param string $name the country name
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/countries/get-countries-by-search Docs
     */
    public function search(string $name, array $query = []): object
    {
        return $this->call("countries/search/$name", $query);
    }

    /**
     * @param array $query the query params
     *
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-leagues-by-country-id Docs
     * @see  Leagues::byCountry
     */
    public function leagues(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No country_id set');
        return (new Leagues())->byCountry($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-country-id Docs
     * @see  Teams::byCountry
     */
    public function teams(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No country_id set');
        return (new Teams())->byCountry($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-players-by-country-id Docs
     * @see  Players::byCountry
     */
    public function players(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No country_id set');
        return (new Players())->byCountry($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-coaches-by-country-id Docs
     * @see  Coaches::byCountry
     */
    public function coaches(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No country_id set');
        return (new Coaches())->byCountry($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referees-by-country-id Docs
     * @see  Referees::byCountry
     */
    public function referees(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No country_id set');
        return (new Referees())->byCountry($this->id, $query);
    }
}
