<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class StateClass extends TestCase
{
    const ID = 1;
    const STATE = 'NS';

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_states()
    {
        $data = FootballApi::states()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_state()
    {
        $data = FootballApi::states()->byId(self::ID);
        $this->assertNotEmpty($data->data);
        $this->assertEquals(self::STATE, $data->data->state);
    }
}
