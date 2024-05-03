<?php

namespace Sportmonks\FootballApi\Clients;

use GuzzleHttp\Client;

class MyClient extends BaseClient
{
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client([
            'base_uri' => 'https://api.sportmonks.com/v3/my/',
        ]);
    }
}
