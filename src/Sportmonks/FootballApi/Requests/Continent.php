<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

class Continent extends FootballApiClient
{
    /**
     * @throws GuzzleException
     */
    public function all(): object
    {
        $response = $this->core->get('continents');
        return $this->process($response);
    }

    /**
     * @throws GuzzleException
     */
    public function byId(int $id): object
    {
        $response = $this->core->get("continents/{$id}");
        return $this->process($response);
    }
}
