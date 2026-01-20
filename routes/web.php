<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fluxy', function () {
    return view('fluxy');
});

Route::get('/laive', function () {
    return view('laive');
});
