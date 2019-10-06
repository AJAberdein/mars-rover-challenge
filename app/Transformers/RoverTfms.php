<?php

namespace App\Transformers;

class RoverTfms
{

    public static function location(string $input) 
    {
    	$input_arr = explode(" ", $input);
    	return [
    			"x" => (int) $input_arr[0],
    			"y" => (int) $input_arr[1],
    			"direction" => $input_arr[2],
    		];
    }	
    
}
