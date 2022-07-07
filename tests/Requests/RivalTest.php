<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class RivalTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_rivals()
    {
        $data = FootballApi::rivals()->all();
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
    }
}
