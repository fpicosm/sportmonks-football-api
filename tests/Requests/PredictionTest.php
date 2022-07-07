<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class PredictionTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_leagues_predictions()
    {
        $data = FootballApi::predictions()->leagues();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_probabilities()
    {
        $data = FootballApi::predictions()->probabilities();
        $this->assertNotEmpty($data->data);
    }
}
