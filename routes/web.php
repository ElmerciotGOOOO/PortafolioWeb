<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseConfigController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fluxy', function () {
    return view('fluxy');
});

Route::get('/laive', function () {
    return view('laive');
});

// Testimonials System
Route::get('/testimonios/enviar', function () {
    return view('testimonios.enviar');
});

// Admin Panel
Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/admin/testimonios', function () {
    return view('admin.testimonios');
});

// Firebase Config API (credentials from .env - not exposed in code)
Route::get('/api/firebase-config', [FirebaseConfigController::class, 'getConfig']);
