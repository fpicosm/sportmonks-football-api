<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\CoreClient;

class Types extends CoreClient
{
    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/types/get-all-types Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('types', $query);
    }

    /**
     * @param int $id the type id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/types/get-type-by-id Docs
     */
    public function find(int $id, array $query = []): object
    {
        return $this->call("types/$id", $query);
    }

    /**
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/types/get-type-by-entity Docs
     */
    public function byEntities(): object
    {
        return $this->call('types/entities');
    }
}
