<?php

namespace Sportmonks\FootballApi\Clients;

use GuzzleHttp\Client;
use InvalidArgumentException;

class OddsClient extends BaseClient
{
    public function __construct ()
    {
        $token = config('football-api.token');

        if (empty($token)) throw new InvalidArgumentException('No API token set');

        $this->client = new Client([
            'base_uri' => 'https://api.sportmonks.com/v3/odds/',
        ]);

        $this->apiToken = $token;
    }
}
