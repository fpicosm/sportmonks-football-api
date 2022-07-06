<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class SeasonTest extends TestCase
{
    const ID = 19734;

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_seasons()
    {
        $data = FootballApi::seasons()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_season()
    {
        $data = FootballApi::seasons()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }
}
