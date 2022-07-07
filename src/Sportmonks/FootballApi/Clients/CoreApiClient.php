<?php

namespace Sportmonks\FootballApi\Clients;

use GuzzleHttp\Client;
use InvalidArgumentException;

class CoreApiClient extends SportmonksClient
{
    protected Client $client;

    public function __construct()
    {
        $apiToken = config('football-api.api_token');
        if (empty($apiToken)) throw new InvalidArgumentException('No API token set');

        $this->client = new Client([
            'base_uri' => 'https://api.sportmonks.com/v3/core/',
            'headers' => [
                'Authorization' => $apiToken,
            ],
        ]);
    }
}
