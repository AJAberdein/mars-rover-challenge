<?php


use Illuminate\Http\Request;;

use App\MarsRoverAnalysis;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

	$x = 6;
	$y = 6;	

    return view('welcome', [
    	'input' => null,
    	'x' => $x,
    	'y' => $y,
    	'grid_error' => false
    ]);
});

Route::post('map/update', function (Request $request) {

	$grid_error = false;
	$input_data = $request->get('input');


	$rover_analyser = new MarsRoverAnalysis();
    $map = $rover_analyser->assessmentToMap($input_data);

    if($map->x > 11 || $map->y > 11) {
    	$grid_error = true;
    }

    return view('welcome', [
    	'input' => $input_data,
    	'map' => $map,
    	'x' => $map->x,
    	'y' => $map->y,
    	'grid_error' => $grid_error
    ]);
});
