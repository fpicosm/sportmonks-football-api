<?php

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;

class PruebaTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_filter_by_league()
    {
        $data = FootballApi::fixtures()->page(2)->all(['leagues' => '8']);
        $this->assertIsArray($data->data);
    }
}
