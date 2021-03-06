<?php

use Illuminate\Http\Request;
use App\Events\SendLocation;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/map', function (Request $request) {
    //print_r($request);
    $lat = $request->input('lat');
    $long = $request->input('long');
    $location = ["lat"=>$lat, "long"=>$long];
    event(new SendLocation($location,'user-123456789-locations'));
    return response()->json(['status'=>'success', 'data'=>$location]);
});
