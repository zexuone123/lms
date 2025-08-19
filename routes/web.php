<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Database\CategoryQuizController;
use App\Http\Controllers\Database\QuizController;
use App\Http\Controllers\Database\SiswaController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::view('/', 'home');
Route::view('/dashboard', 'dashboard');
Route::view('/courses/{id}', 'course-detail');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard-admin', [DashboardController::class, 'index'])->name('dashboard.admin');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

    // Trash / Soft Delete related
    Route::get('/users/trash', [UserController::class, 'trashList'])->name('users.trash.list');
    Route::delete('/users/{id}/trash', [UserController::class, 'trash'])->name('users.trash');
    Route::get('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::delete('/users/{id}/delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');

    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');

    // Trash-related
    Route::get('permissions-trash', [PermissionController::class, 'trashList'])->name('permissions.trash.list');
    Route::delete('permissions/{id}/trash', [PermissionController::class, 'trash'])->name('permissions.trash');
    Route::get('permissions/{id}/restore', [PermissionController::class, 'restore'])->name('permissions.restore');
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
    Route::get('roles/{id}/restore', [RoleController::class, 'restore'])->name('roles.restore');
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

    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    Route::get('/category-quiz', [CategoryQuizController::class, 'index'])->name('category-quiz.index');
    Route::post('/category-quiz', [CategoryQuizController::class, 'store'])->name('category-quiz.store');
    Route::put('/category-quiz/{id}', [CategoryQuizController::class, 'update'])->name('category-quiz.update');
    Route::delete('/category-quiz/{id}', [CategoryQuizController::class, 'destroy'])->name('category-quiz.destroy');

    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz.create');
    Route::get('/quiz/{id}/edit', [QuizController::class, 'edit'])->name('quiz.edit');
    Route::post('/quiz', [QuizController::class, 'store'])->name('quiz.store');
    Route::put('/quiz/{id}', [QuizController::class, 'update'])->name('quiz.update');
    Route::delete('/quiz/{id}', [QuizController::class, 'destroy'])->name('quiz.destroy');
});


Route::middleware(['auth:siswa'])->group(function () {
    // Dashboard utama
    Route::get('/dashboard', [FrontendController::class, 'index'])
        ->name('dashboard.siswa');
});

// Halaman utama daftar pelajaran
Route::get('/belajar-anak', [FrontendController::class, 'belajarAnak'])->name('belajar-anak');

Route::middleware('auth')->prefix('dashboard')->group(function () {
    // Group untuk semua mata pelajaran TK & SD
    Route::prefix('belajar-anak')->group(function () {
        Route::get('/matematika', [FrontendController::class, 'matematika'])->name('belajar-anak.matematika');
        Route::get('/bahasa-indonesia', [FrontendController::class, 'bahasa'])->name('belajar-anak.bahasa');
        Route::get('/sains', [FrontendController::class, 'sains'])->name('belajar-anak.sains');
        Route::get('/agama', [FrontendController::class, 'agama'])->name('belajar-anak.agama');
        Route::get('/literasi', [FrontendController::class, 'literasi'])->name('belajar-anak.literasi');
        Route::get('/numerasi', [FrontendController::class, 'numerasi'])->name('belajar-anak.numerasi');
        Route::get('/seni', [FrontendController::class, 'seni'])->name('belajar-anak.seni');
        Route::get('/jati-diri', [FrontendController::class, 'jatiDiri'])->name('belajar-anak.jati-diri');
    });
});


Route::get('/test', [TestController::class, 'index'])->name('test.index');
Route::get('/quiz/{id}', [TestController::class, 'show'])->name('quiz.show');

// Group untuk semua mata pelajaran TK & SD
Route::prefix('belajar-anak')->group(function () {
    Route::get('/matematika', function () {
        return view('belajar-anak.matematika');
    });
    Route::get('/bahasa-indonesia', function () {
        return view('belajar-anak.bahasa');
    });
    Route::get('/sains', function () {
        return view('belajar-anak.sains');
    });
    Route::get('/agama', function () {
        return view('belajar-anak.agama');
    });
    Route::get('/literasi', function () {
        return view('belajar-anak.literasi');
    });
    Route::get('/numerasi', function () {
        return view('belajar-anak.numerasi');
    });
    Route::get('/seni', function () {
        return view('belajar-anak.seni');
    });
    Route::get('/jati-diri', function () {
        return view('belajar-anak.jati-diri');
    });
});

//materi//
// Perkalian
Route::view('/materi/matematika/perkalian', 'belajar-anak.materi.matematika.index')->name('materi.index');

// Pecahan
Route::view('/materi/matematika/pecahan', 'belajar-anak.materi.matematika.pecahan.index')->name('materi.pecahan.index');

// Operasi Angka
Route::view('/materi/matematika/operasi-angka', 'belajar-anak.materi.matematika.operasi-angka.index')->name('materi.operasi-angka.index');

