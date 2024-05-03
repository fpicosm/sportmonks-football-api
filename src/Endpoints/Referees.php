<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Referees extends FootballClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-all-referees Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('referees', $query);
    }

    /**
     * @param int $id the id of the referee
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referee-by-id Docs
     */
    public function find(int $id, array $query = []): object
    {
        return $this->call("referees/$id", $query);
    }

    /**
     * @param int $countryId the id of the country
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referees-by-country-id Docs
     */
    public function byCountry(int $countryId, array $query = []): object
    {
        return $this->call("referees/countries/$countryId", $query);
    }

    /**
     * @param int $seasonId the id of the season
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referees-by-season-id Docs
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->call("referees/seasons/$seasonId", $query);
    }

    /**
     * @param string $name the referee name to search
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referees-by-search-by-name Docs
     */
    public function search(string $name, array $query = []): object
    {
        return $this->call("referees/search/$name", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see Statistics::refereesBySeason()
     */
    public function statisticsBySeason(int $seasonId, array $query = []): object
    {
        return (new Statistics())->refereesBySeason($seasonId, $query);
    }
}
