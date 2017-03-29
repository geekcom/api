<?php

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

Route::get('api/v1', function () {
    return 'API';
});

//Authentication
Route::post('api/v1/auth', 'AuthenticateController@authJwt');

//User
Route::post('api/v1/user', 'UserController@store');
Route::group(['prefix' => 'api/v1/user', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'UserController@show');
    Route::put('{id}', 'UserController@update');
    Route::delete('{id}', 'UserController@delete');
});

//Workout Type
Route::group(['prefix' => 'api/v1/workout_type', 'middleware' => 'jwt.auth'], function () {
    Route::post('/', 'WorkoutTypeController@store');
    Route::get('{id}', 'WorkoutTypeController@show');
    Route::put('{id}', 'WorkoutTypeController@update');
    Route::delete('{id}', 'WorkoutTypeController@delete');
});

//Workout Plan
Route::group(['prefix' => 'api/v1/workout_plan', 'middleware' => 'jwt.auth'], function () {
    Route::post('/', 'WorkoutPlanController@store');
    Route::get('{id}', 'WorkoutPlanController@workoutPlanByUser');
    Route::put('{id}', 'WorkoutPlanController@update');
    Route::delete('{id}', 'WorkoutPlanController@delete');
});