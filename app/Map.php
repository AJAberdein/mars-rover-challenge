<?php

namespace App;

class Map
{

	public $x;
	public $y;
	protected $rovers = [];

     /**
     * Instantiate a new Map instance.
     */
    public function __construct($x, $y)
    {
    	$this->x = $x;
    	$this->y = $y;
    }

  	/**
     * Add a Rover instance on to the this
     */
    public function addRover(Rover $rover) 
    {
    	$this->rovers[$rover->id] = $rover;
    }

    /**
     * Get a Rover instance from this map's Rovers
     */
    public function getRover($rover_id) 
    {
    	return $this->rovers[$rover_id];
    }

    /**
     * Rotate or Move a Rover through the map
     */
    public function moveRover($rover_id, $move_pattern) 
    {
    	$rover = $this->rovers[$rover_id];

    	foreach($move_pattern as $movement ) {
    		switch ($movement) {
			    case "L":
			        $rover->rotateLeft();
			        break;
			    case "R":
			        $rover->rotateRight();			        
			        break;
			    case "M":
			        $rover->move();		
			        break;
		    	default:
        			throw new \Exception("Invalid move! Must be 'L', 'R' or 'M'");
        	}
    	}

    	return $rover;
  
    }
}
