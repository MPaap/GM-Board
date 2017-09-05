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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard')->uses('DashboardController@index');
Route::get('screen')->uses('ScreenController@index');
Route::get('screen/players')->uses('ScreenController@players');
Route::get('screen/encounter')->uses('ScreenController@encounter');
Route::post('player/{player}/hp')->uses('PlayerController@hitPoints');
Route::resource('player', 'PlayerController');
Route::get('encounter/{encounter}/next')->uses('EncounterController@nextCharacter');
Route::resource('encounter', 'EncounterController');
