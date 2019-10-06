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

    /**
     * @test
     */
    public function two_mars_rovers_can_move_correctly_through_a_map()
    {
    	$map = new Map(5, 5);
        $rover_01 = new Rover("rover_01", 1, 2, "N");
        $rover_02 = new Rover("rover_02", 3, 3, "E");

        $map->addRover($rover_01);
        $map->addRover($rover_02);

        $move_pattern_01 = RoverTfms::movePattern("LMLMLMLMM");
        $move_pattern_02 = RoverTfms::movePattern("MMRMMRMRRM");

 		$rover_01 = $map->moveRover($rover_01->id, $move_pattern_01);
 		$rover_02 = $map->moveRover($rover_02->id, $move_pattern_02);

        $this->assertEquals(1, $rover_01->x);
        $this->assertEquals(3, $rover_01->y);
        $this->assertEquals("N", $rover_01->direction);

        $this->assertEquals(5, $rover_02->x);
        $this->assertEquals(1, $rover_02->y);
        $this->assertEquals("E", $rover_02->direction);

    }

}
