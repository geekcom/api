<?php

use Illuminate\Http\Request;

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

//Authentication
Route::post('v1/auth', 'AuthenticateController@authJwt');

//Users
Route::post('v1/users', 'UserController@store');
Route::group(['prefix' => 'v1/users', 'middleware' => 'jwt.auth'], function () {
    Route::get('{uuid}', 'UserController@show');
    Route::put('{uuid}', 'UserController@update');
    Route::delete('{uuid}', 'UserController@delete');
});

//Workout Types
Route::group(['prefix' => 'v1/workout_types', 'middleware' => 'jwt.auth'], function () {
    Route::post('/', 'WorkoutTypeController@store');
    Route::get('{uuid}', 'WorkoutTypeController@show');
    Route::put('{uuid}', 'WorkoutTypeController@update');
    Route::delete('{uuid}', 'WorkoutTypeController@delete');
});

//Workout Plans
Route::group(['prefix' => 'v1/workout_plans', 'middleware' => 'jwt.auth'], function () {
    Route::post('/', 'WorkoutPlanController@store');
    Route::get('{uuid}', 'WorkoutPlanController@workoutPlanByUser');
    Route::put('{uuid}', 'WorkoutPlanController@update');
    Route::delete('{uuid}', 'WorkoutPlanController@delete');
});