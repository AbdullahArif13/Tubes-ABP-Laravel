<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShelterController;
use App\Http\Controllers\AuthController;
// Controller yang berada di dalam folder Beranda
use App\Http\Controllers\Beranda\FormController;
use App\Http\Controllers\Beranda\PembayaranController;

/*
|--------------------------------------------------------------------------
| Web Routes - Project Hewanku (Laravel Frontend for Java Backend)
|--------------------------------------------------------------------------
*/

// 1. Redirect Awal: Jika buka domain utama, arahkan ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Rute Guest: Hanya bisa diakses jika user BELUM login
Route::middleware('guest')->group(function () {
    // --- LOGIN ---
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // --- REGISTER ---
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    
    // --- FORGOT PASSWORD (FIXED) ---
    // Pastikan view mengarah ke 'auth.forgot-password' sesuai nama file lo
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password'); 
    })->name('forgot_pass');

    // Rute POST ini wajib ada supaya form @forgot-password.blade.php bisa submit
    Route::post('/forgot-password', [AuthController::class, 'handleForgotPassword'])->name('forgot_pass.post');

    // --- SET PASSWORD (BARU) ---
    Route::get('/set-password', [AuthController::class, 'showSetPassword'])->name('password.reset');
});

// 3. Rute Authenticated: Harus Login
Route::middleware(['auth'])->group(function () {

    // Proses Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // --- SEKSI SEBELUM PUNYA SHELTER ---
    Route::get('/buat-shelter', function () {
        return view('beranda.buat_shelter');
    })->name('buat_shelter');

    Route::post('/buat-shelter', [ShelterController::class, 'store'])->name('buat_shelter.post');


    // --- SEKSI TERKUNCI (Harus punya Shelter Aktif) ---
    // Middleware 'check.shelter' memastikan statusShelter === true di session
    Route::middleware(['check.shelter'])->group(function () {
        
        // Dashboard Utama / Daftar Hewan
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        // Manajemen Form (Status Adopsi)
        Route::prefix('form')->name('form.')->group(function() {
            Route::get('/', [FormController::class, 'index'])->name('index');
        });

        // Manajemen Pembayaran (Riwayat Transaksi)
        Route::prefix('pembayaran')->name('pembayaran.')->group(function() {
            Route::get('/', [PembayaranController::class, 'index'])->name('index');
        });

        // Profil Shelter
        Route::prefix('profile')->name('profile.')->group(function() {
            Route::get('/', [ShelterController::class, 'index'])->name('index');
        });
    });
});