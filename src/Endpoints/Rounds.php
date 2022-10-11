<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\FootballApiClient;

class Rounds extends FootballApiClient
{
    /**
     * @var int|null the season id
     */
    protected ?int $id;

    /**
     * @param  int|null  $id  the season id
     */
    public function __construct (?int $id = NULL)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * @return object the response object
     *
     * @param  int    $id     the round id
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function find (int $id, array $query = []) : object
    {
        return $this->call("rounds/$id", $query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $seasonId  the season id
     * @param  array  $query    the query params
     *
     * @throws GuzzleException
     */
    public function standings (int $seasonId, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');

        return $this->call("standings/season/$seasonId/round/$this->id", $query);
    }
}
