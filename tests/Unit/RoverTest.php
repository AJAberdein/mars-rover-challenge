<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Transformers\RoverTfms;
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
        $rover = new Rover($location['x'], $location['y'], $location['direction']);

        $this->assertInstanceOf(Rover::class, $rover);
        $this->assertEquals(1, $rover->x);
        $this->assertEquals(2, $rover->y);
        $this->assertEquals("N", $rover->direction);
    }

}
