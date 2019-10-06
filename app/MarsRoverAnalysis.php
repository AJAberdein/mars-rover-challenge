<?php

namespace App;

use App\Map;
use App\Rover;

use App\Transformers\MapTfms;
use App\Transformers\RoverTfms;

class MarsRoverAnalysis
{
    public function assess($input) 
    {

    	$input_data = explode("\n", trim($input));

    	$coords = MapTfms::coords(trim($input_data[0]));
        $map = new Map($coords['x'], $coords['y']);

    	$this->attachInputRoversOntoMap($map, $input_data);

    	$result_string = "";
    	foreach( $map->getRovers() as $rover) {
    		$rover = $map->moveRover($rover->id, $rover->move_pattern);
    		$result_string .= "{$rover->x} {$rover->y} {$rover->direction}\n";
    	}

    	return $result_string;

    }

    protected function attachInputRoversOntoMap($map, $input_data) {
    	$impl_type = "loc";
    	$rover;

    	foreach( \Arr::except($input_data, [0]) as $key => $line_item) 
    	{
    		if($impl_type == "loc") {
    			$location = RoverTfms::location(trim($line_item));
    			$rover = new Rover("rover_{$key}", $location['x'], $location['y'], $location['direction']);
    			$map->addRover($rover);
    		}

			if($impl_type == "mov") {
				$rover->move_pattern = RoverTfms::movePattern(trim($line_item));
    		}

    		$impl_type == "loc" ? $impl_type = "mov" : $impl_type = "loc";
    	}
    }

}
