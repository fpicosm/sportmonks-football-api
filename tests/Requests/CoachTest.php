<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class CoachTest extends TestCase
{
    const ID = 455353;
    const NAME = 'Klopp';

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_coaches()
    {
        $data = FootballApi::coaches()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_coach()
    {
        $data = FootballApi::coaches()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_coaches_by_search()
    {
        $data = FootballApi::coaches()->search(self::NAME);
        $this->assertNotEmpty($data->data);
    }


    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_last_updated_coaches()
    {
        $data = FootballApi::coaches()->lastUpdated();
        $this->assertNotEmpty($data->data);
    }
}
