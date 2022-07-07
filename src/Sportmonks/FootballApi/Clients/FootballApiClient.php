<?php

namespace Sportmonks\FootballApi\Clients;

use GuzzleHttp\Client;
use InvalidArgumentException;

class FootballApiClient extends BaseClient
{
    protected Client $client;

    public function __construct()
    {
        $apiToken = config('football-api.api_token');
        if (empty($apiToken)) throw new InvalidArgumentException('No API token set');

        $this->client = new Client([
            'base_uri' => 'https://api.sportmonks.com/v3/football/',
            'headers' => [
                'Authorization' => $apiToken,
            ]
        ]);
    }
}
