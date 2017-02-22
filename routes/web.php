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

Route::post('api/v1/auth', 'AuthenticateController@authJwt');

Route::group(['prefix' => 'api/v1/user', 'middleware' => 'jwt.auth'], function () {
    Route::post('new', 'UserController@store');
    Route::get('show/{id}', 'UserController@show');
    Route::put('update/{id}', 'UserController@update');
    Route::delete('delete/{id}', 'UserController@delete');
});

Route::group(['prefix' => 'api/v1/workout_type', 'middleware' => 'jwt.auth'], function () {
    Route::post('new', 'WorkoutTypeController@store');
    Route::get('show/{id}', 'WorkoutTypeController@show');
    Route::put('update/{id}', 'WorkoutTypeController@update');
    Route::delete('delete/{id}', 'WorkoutTypeController@delete');
});

Route::group(['prefix' => 'api/v1/workout_plan', 'middleware' => 'jwt.auth'], function () {
    Route::post('new', 'WorkoutPlanController@store');
    Route::get('show/{id}', 'WorkoutPlanController@show');
    Route::put('update/{id}', 'WorkoutPlanController@update');
    Route::delete('delete/{id}', 'WorkoutPlanController@delete');
});