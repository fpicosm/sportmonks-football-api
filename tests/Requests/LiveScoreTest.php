<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class LiveScoreTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_livescores()
    {
        $data = FootballApi::livescores()->all();
        $this->assertIsArray($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_inplay_livescores()
    {
        $data = FootballApi::livescores()->inplay();
        $this->assertIsArray($data->data);
    }
}
