<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\MarsRoverAnalysis;

class MarsRoverAnalysisTest extends TestCase
{
    /**
     * @test
     */
    public function a_single_mars_rover_can_navigate_a_map()
    {

        $input = "
            5 5
            1 2 N
            LMLMLMLMM
        ";

        $rover_analyser = new MarsRoverAnalysis();
        $result = $rover_analyser->assess($input);


        // dd($result);
        $this->assertEquals("1 3 N\n", $result);
    }

    /**
     * @test
     */
    public function two_mars_rover_can_navigate_a_map()
    {
        $input = "
            5 5
            1 2 N
            LMLMLMLMM
            3 3 E
            MMRMMRMRRM
        ";

        $rover_analyser = new MarsRoverAnalysis();
        $result = $rover_analyser->assess($input);

        $this->assertEquals("1 3 N\n5 1 E\n", $result);

    }
}
