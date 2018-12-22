<?php

Route::get('/', 'HomeController@index');
Route::get('/score/create', 'ScoreController@create');
Route::post('/score', 'ScoreController@store');