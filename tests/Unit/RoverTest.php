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
        $rover = new Rover('rover_01', $location['x'], $location['y'], $location['direction']);

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
        $rover = new Rover('rover_01', 1, 2, "N");
        $map->addRover($rover);

        $this->assertInstanceOf(Rover::class, $map->getRover($rover->id));
    }

    /**
     * @test
     */
    public function a_mars_rover_can_move_correctly_through_a_map()
    {
    	$map = new Map(5, 5);
        $rover = new Rover("rover_01", 1, 2, "N");
        $map->addRover($rover);
        $input = "LMLMLMLMM";
        $move_pattern = RoverTfms::movePattern($input);
 		$rover = $map->moveRover($rover->id, $move_pattern);

        $this->assertEquals(1, $rover->x);
        $this->assertEquals(3, $rover->y);
        $this->assertEquals("N", $rover->direction);
    }

}
