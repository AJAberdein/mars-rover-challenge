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
}
