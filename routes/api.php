<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::get('/', 'APIAuthController@test');
Route::get('/events', [App\Http\Controllers\EventController::class, 'allEvents']);
Route::post('place/order', [App\Http\Controllers\EventController::class, 'placeOrder']);
Route::get('/event/{id}', [App\Http\Controllers\EventController::class, 'singleEvent']);
Route::get('/', [App\Http\Controllers\APIAuthController::class, 'test']);
Route::post('/me', [App\Http\Controllers\APIAuthController::class, 'me']);
Route::post('customer/register', [App\Http\Controllers\APIAuthController::class, 'cusomerRegister']);
Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {


//    Route::post('login', 'AuthController@login');
    Route::post('/login', [App\Http\Controllers\APIAuthController::class, 'login']);
    // Route::post('customer/register', [App\Http\Controllers\APIAuthController::class, 'cusomerRegister']);



//    Route::post('logout', 'AuthController@logout');
//    Route::post('refresh', 'AuthController@refresh');
//    Route::post('me', 'AuthController@me');
});
