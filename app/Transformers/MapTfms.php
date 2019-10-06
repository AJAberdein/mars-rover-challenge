<?php

namespace App\Transformers;

class MapTfms
{
    public static function coords(string $input) {

    	$input_arr = explode(" ", $input);
    	return [
    			"x" => $input_arr[0],
    			"y" => $input_arr[1],
    		];
    }
}
