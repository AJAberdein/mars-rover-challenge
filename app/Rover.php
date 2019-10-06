<?php

namespace App;

class Rover
{
	public $id;
    public $x;
	public $y;
	public $direction;
	public $move_pattern;
	
     /**
     * Instantiate a new Rover instance.
     */
    public function __construct($id, int $x, int $y, $direction)
    {
    	(! in_array($direction, ["N", "S", "E", "W"])) ? $this->throwDirectionTypingException() : '';

    	$this->id = $id;
    	$this->x = $x;
    	$this->y = $y;
    	$this->direction = $direction;
    }

    /**
     * Rotates the Rover Left
     */
    public function rotateLeft()
    {
    	switch ($this->direction) {
			case "N":
			    $this->direction = "W";
			    break;
			case "W":
			    $this->direction = "S";
			    break;
			case "S":
			    $this->direction = "E";
			    break;
			case "E":
			    $this->direction = "N";
			    break;
		}
    }

    /**
     * Rotates the Rover Left
     */
    public function rotateRight()
    {
    	switch ($this->direction) {
			case "N":
			    $this->direction = "E";
			    break;
			case "E":
			    $this->direction = "S";
			    break;
			case "S":
			    $this->direction = "W";
			    break;
			case "W":
			    $this->direction = "N";
			    break;
		}
    }

    /**
     * Moves Rover along the x or y axis 1 space
     */
    public function move()
    {
    	switch ($this->direction) {
			case "N";
			    $this->y++;
			    break;
			case "S";
			    $this->y--;
			    break;
			case "E";
			    $this->x++;
			    break;
			case "W";
			    $this->x--;
			    break;
		}
    }


    protected function throwDirectionTypingException() 
    {
	    throw new \Exception("Invalid direction, must be 'N', 'S', 'E' or 'W'");
	}
}
