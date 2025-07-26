<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/', 'home');
Route::view('/dashboard', 'dashboard');
Route::view('/courses/{id}', 'course-detail');

Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login']);
Route::post('/logout', [LoginController::class,'logout'])->name('logout');
Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function(){
        return view('dashboard'); // siswa
    });

    Route::get('/admin/dashboard', function(){
        return view('admin.dashboard'); // admin
    });
});

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/admin/dashboard', function(){ return view('admin.dashboard'); });
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

