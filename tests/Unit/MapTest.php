<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MapTest extends TestCase
{
    /**
     * @test
     */
    public function a_map_can_be_created()
    {
        $input = "5 5";
        $coords = MapTfms::coords($input);
        $map = new Map($coords['x'], $coords['y']);

        $this->assertInstanceOf(Map::class, $map);
        $this->assertTrue(5, $map->x);
        $this->assertTrue(5, $map->y);
    }
}
