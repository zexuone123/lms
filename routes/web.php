<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/', 'home');
Route::view('/dashboard', 'dashboard');
Route::view('/courses/{id}', 'course-detail');
Route::post('/logout', [LoginController::class,'logout'])->name('logout');

Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard-admin', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

    // Trash / Soft Delete related
    Route::get('/users/trash', [UserController::class, 'trashList'])->name('users.trash.list');
    Route::delete('/users/{id}/trash', [UserController::class, 'trash'])->name('users.trash');
    Route::put('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::delete('/users/{id}/delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');

    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');

    // Trash-related
    Route::get('permissions-trash', [PermissionController::class, 'trashList'])->name('permissions.trash.list');
    Route::delete('permissions/{id}/trash', [PermissionController::class, 'trash'])->name('permissions.trash');
    Route::post('permissions/{id}/restore', [PermissionController::class, 'restore'])->name('permissions.restore');
    Route::delete('permissions/{id}/force-delete', [PermissionController::class, 'forceDelete'])->name('permissions.forceDelete');

    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles/{id}', [RoleController::class, 'update'])->name('roles.update');

    // Trash features
    Route::get('roles-trash', [RoleController::class, 'trashList'])->name('roles.trash.list');
    Route::delete('roles/{id}/trash', [RoleController::class, 'trash'])->name('roles.trash');
    Route::post('roles/{id}/restore', [RoleController::class, 'restore'])->name('roles.restore');
    Route::delete('roles/{id}/force-delete', [RoleController::class, 'forceDelete'])->name('roles.forceDelete');

    Route::get('/impersonate/{id}', function ($id) {
        $user = User::findOrFail($id);

        if (auth()->user()->can('impersonate') && auth()->id() !== $user->id) {
            auth()->user()->impersonate($user);
            return redirect('/dashboard-admin');
        }

        abort(403);
    })->name('impersonate');

    Route::get('/leave-impersonate', function () {
        auth()->user()->leaveImpersonation();
        return redirect('/dashboard-admin');
    })->name('impersonate.leave');
});

Route::middleware('auth')->group(function () {
  Route::get('/dashboard', function(){
        return view('dashboard'); // siswa
    });
});