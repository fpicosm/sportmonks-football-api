<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballClient;

class News extends FootballClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/news/get-pre-match-news Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('news/pre-match', $query);
    }

    /**
     * @param int $seasonId the season id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/news/get-pre-match-news-by-season-id Docs
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->call("news/pre-match/seasons/$seasonId", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/news/get-pre-match-news-for-upcoming-fixtures Docs
     */
    public function upcoming(array $query = []): object
    {
        return $this->call('news/pre-match/upcoming', $query);
    }
}
