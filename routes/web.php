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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/clubs', 'ClubsController@store');
Route::get('/clubs', 'ClubsController@index');
Route::get('/club/{club}', 'ClubsController@show');

Route::post('/teams', 'TeamsController@store');
Route::get('/team/{team}', 'TeamsController@show');
