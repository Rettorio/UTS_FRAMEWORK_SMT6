<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\PenyelenggaraController;
use App\Http\Controllers\WisataController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// --- Consumer / Pembeli tiket halaman login ---
// This will be the default fallback for Auth::middleware('auth') if not specified otherwise
Route::get('/login', [AuthController::class, 'showConsumerLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- ADMIN LOGIN ---
Route::get('/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']); 

// --- PENYELENGGARA LOGIN ---
Route::get('/penyelenggara/login', [AuthController::class, 'showPenyelenggaraLoginForm'])->name('penyelenggara.login');
Route::post('/penyelenggara/login', [AuthController::class, 'login']); 


Route::middleware(['auth', 'role:' . User::$ROLE_ADMIN])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('wisata', WisataController::class);
    Route::get('daftar-event', [AdminController::class, 'daftarEvent'])->name('event');
    // tambahkan route admin lain disini
});

// Protected Penyelenggara Routes
Route::middleware(['auth', 'role:' . User::$ROLE_PENYELENGGARA])->prefix('penyelenggara')->name('penyelenggara.')->group(function () {
    Route::get('/', [PenyelenggaraController::class, 'index'])->name('index');
    Route::get('/dashboard', [PenyelenggaraController::class, 'dashboard'])->name('dashboard');
    // tambahkan route penyelenggara lain di bawah sini
});

// Protected Consumer Routes
Route::middleware(['auth', 'role:' . User::$ROLE_CONSUMER])->prefix('consumer')->name('consumer.')->group(function () {
    Route::get('/', [ConsumerController::class, 'index'])->name('index');
    Route::get('/dashboard', [ConsumerController::class, 'dashboard'])->name('dashboard');
    // tambahkan route consumer lain di bawah sini
});