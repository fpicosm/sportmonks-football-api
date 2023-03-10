<?php

namespace Globals;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class SelectTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_select_fields_properly ()
    {
        $teams = FootballApi::teams()->all()->data;
        $team = collect($teams)->first();
        $this->assertTrue(property_exists($team, 'gender'));

        $teams = FootballApi::teams()->select([ 'id', 'name' ])->all()->data;
        $team = collect($teams)->first();
        $this->assertFalse(property_exists($team, 'gender'));
    }
}
