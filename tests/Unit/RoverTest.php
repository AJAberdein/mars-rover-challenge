<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Transformers\RoverTfms;
use App\Rover;
use App\Map;

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

    /**
     * @test
     */
    public function a_mars_rover_can_be_added_to_a_map()
    {
    	$map = new Map(5, 5);
        $rover = new Rover(1, 2, "N");
        $map->addNewRover($rover);

        $this->assertInstanceOf(MarsRover::class, $map->getRover($rover->id));
    }

}
