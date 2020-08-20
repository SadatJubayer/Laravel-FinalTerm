<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'loginController@index');
Route::post('/login', 'loginController@validateUser');
