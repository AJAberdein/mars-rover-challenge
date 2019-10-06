<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Transfomers\RoverTfms;
use App\Rover;

class RoverTest extends TestCase
{
      /**
     * @test
     */
    public function a_mars_rover_can_be_created()
    {
        $input = "1 2 N";
        $location = RoverTfms::location($input);
        //TODO: throw an exception if this can't be transformed
        $rover = new Rover($location['x'], $location['y'], $location['direction']);

        $this->assertInstanceOf(MarsRover::class, $rover);
        $this->assertEquals(1, $rover->x);
        $this->assertEquals(5, $rover->y);
        $this->assertEquals("N", $rover->direction);
    }

}
