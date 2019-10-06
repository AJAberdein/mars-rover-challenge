<?php

namespace App;

class Rover
{
    public $x;
	public $y;
	public $direction;
	
     /**
     * Instantiate a new Rover instance.
     */
    public function __construct(int $x, int $y, $direction)
    {
    	(! in_array($direction, ["N", "S", "E", "W"])) ? $this->throwDirectionTypingException() : '';

    	$this->x = $x;
    	$this->y = $y;
    	$this->direction = $direction;
    }

    function throwDirectionTypingException() {
	    throw new Exception("Invalid direction, must be 'N', 'S', 'E' or 'W'");
	}
}
