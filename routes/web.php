<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\MahasiswaMenuController;
use App\Http\Controllers\ApprovalController;

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard Dosen
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:dosen'])->group(function () {

    Route::get('/dashboard/dosen', [DashboardController::class, 'dosen'])
        ->name('dashboard.dosen');

    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('dosen', DosenController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::resource('matakuliah', MataKuliahController::class);
    Route::resource('kelas', KelasController::class)
    ->parameters([
        'kelas' => 'kelas'
    ]);
    /*
    |--------------------------------------------------------------------------
    | Approval KRS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/approval-krs',
        [ApprovalController::class,'index']
    )->name('approval.index');

    Route::get(
        '/approval-krs/{krs}',
        [ApprovalController::class,'show']
    )->name('approval.show');

    Route::put(
        '/approval-krs/{krs}/approve',
        [ApprovalController::class,'approve']
    )->name('approval.approve');

    Route::put(
        '/approval-krs/{krs}/reject',
        [ApprovalController::class,'reject']
    )->name('approval.reject');
});

/*
|--------------------------------------------------------------------------
| Dashboard Mahasiswa
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard/mahasiswa', [DashboardController::class, 'mahasiswa'])
        ->name('dashboard.mahasiswa');

    Route::resource('krs', KrsController::class)
        ->only([
            'index',
            'create',
            'store',
            'destroy'
        ]);
    Route::get('/jadwal', [MahasiswaMenuController::class, 'jadwal'])
    ->name('mahasiswa.jadwal');

    Route::get('/hasil-studi', [MahasiswaMenuController::class, 'hasilStudi'])
        ->name('mahasiswa.hasilstudi');

    Route::get('/profil', [MahasiswaMenuController::class, 'profil'])
        ->name('mahasiswa.profil');

});