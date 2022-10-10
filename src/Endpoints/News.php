<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class News extends FootballApiClient
{
    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function all (array $query = []) : object
    {
        return $this->call('news/fixtures', $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function upcoming (array $query = []) : object
    {
        return $this->call('news/fixtures/upcoming', $query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     *
     * @throws GuzzleException
     */
    public function bySeason (int $seasonId, array $query = []) : object
    {
        return (new Seasons($seasonId))->news($query);
    }
}
