<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\PenyelenggaraController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ============================
//         AUTH ROUTE
// ============================

// Login untuk Customer / Pembeli Tiket
Route::get('/login', [AuthController::class, 'showConsumerLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Login untuk Admin
Route::get('/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']); 

// Login untuk Penyelenggara
Route::get('/penyelenggara/login', [AuthController::class, 'showPenyelenggaraLoginForm'])->name('penyelenggara.login');
Route::post('/penyelenggara/login', [AuthController::class, 'login']); 


// ============================
//         ADMIN ROUTE
// ============================
Route::middleware(['auth', 'role:' . User::$ROLE_ADMIN])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    });


// ============================
//     PENYELENGGARA ROUTE
// ============================
Route::middleware(['auth', 'role:' . User::$ROLE_PENYELENGGARA])
    ->prefix('penyelenggara')
    ->name('penyelenggara.')
    ->group(function () {
        Route::get('/', [PenyelenggaraController::class, 'index'])->name('index');
        Route::get('/create', [PenyelenggaraController::class, 'create'])->name('create');
        Route::post('/', [PenyelenggaraController::class, 'store'])->name('store');
        Route::delete('/{id}', [PenyelenggaraController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/edit', [PenyelenggaraController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PenyelenggaraController::class, 'update'])->name('update');
    });


// ============================
//         CUSTOMER ROUTE
// ============================
Route::middleware(['auth', 'role:' . User::$ROLE_CONSUMER])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {
        Route::get('/', [ConsumerController::class, 'index'])->name('index');
        Route::get('/dashboard', [ConsumerController::class, 'dashboard'])->name('dashboard');
    });