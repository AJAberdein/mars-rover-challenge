<?php

namespace App\Transformers;

class MapTfms
{
    public static function coords(string $input) 
    {
    	$input_arr = explode(" ", $input);
    	return [
    			"x" => (int) $input_arr[0],
    			"y" => (int) $input_arr[1],
    		];
    }


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
