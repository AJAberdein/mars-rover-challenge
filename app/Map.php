<?php

namespace App;

class Map
{

	public $x;
	public $y;
     /**
     * Instantiate a new Map instance.
     */
    public function __construct($x, $y)
    {

    	// TODO: maybe a height and length array could be better suited

    	$this->x = $x;
    	$this->y = $y;

    }
}
