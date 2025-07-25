<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/', 'home');
Route::view('/dashboard', 'dashboard');
Route::view('/courses/{id}', 'course-detail');
