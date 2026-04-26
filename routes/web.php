<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShelterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\Beranda\PembayaranController;

/*
|--------------------------------------------------------------------------
| Web Routes - Project Hewanku
|--------------------------------------------------------------------------
*/

// 1. Landing & Initial Redirect
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Guest Routes (Tanpa Login - Mapping: PenggunaController & ShelterController)
Route::middleware('guest')->group(function () {
    // Auth & Register
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    // OTP & Forgot Password (Mapping: /forgot & /verify di BE)
    Route::get('/forgot-password', [AuthController::class, 'showForgot'])->name('forgot_pass');
    Route::post('/forgot-password', [AuthController::class, 'handleForgotPassword'])->name('forgot_pass.post');
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('otp.verify.post');
});

// 3. Authenticated Routes (Mapping ke semua fitur yang butuh Bearer Token)
Route::middleware(['check.shelter'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // --- DASHBOARD (Mapping: /animalshelter/pengguna) ---
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/hewan/{id}', [HomeController::class, 'show'])->name('hewan.detail');

    // --- PESANAN & ADOPSI (Mapping: /pesanan) ---
    Route::prefix('pesanan')->name('pesanan.')->group(function() {
        Route::get('/', [PesananController::class, 'index'])->name('index'); // viewPesananPengguna
        Route::post('/create/{idHewan}', [PesananController::class, 'store'])->name('create');
        Route::post('/fill/{id}', [PesananController::class, 'submitForm'])->name('fill.post'); // isiForm
    });

    // --- ULASAN (Mapping: /ulasan/{idHewan}) ---
    Route::post('/ulasan/{idHewan}', [HomeController::class, 'storeUlasan'])->name('ulasan.store');

    // --- MANAJEMEN SHELTER (Mapping: /shelter) ---
    Route::get('/buat-shelter', function () { return view('beranda.buat_shelter'); })->name('buat_shelter');
    Route::post('/buat-shelter', [ShelterController::class, 'store'])->name('buat_shelter.post'); // /shelter/create

    Route::prefix('shelter')->name('shelter.')->group(function() {
        Route::get('/profil', [ShelterController::class, 'index'])->name('index'); // /shelter/view
        
        // CRUD Hewan oleh Shelter
        Route::prefix('animals')->name('animals.')->group(function() {
            Route::get('/', [ShelterController::class, 'myAnimals'])->name('index');
            Route::post('/add', [ShelterController::class, 'storeAnimal'])->name('store'); // /shelter/add
            Route::post('/edit/{id}', [ShelterController::class, 'updateAnimal'])->name('update'); // /shelter/edit/{id}
            Route::delete('/delete/{id}', [ShelterController::class, 'destroyAnimal'])->name('destroy'); // /shelter/delete/{id}
        });

        // Konfirmasi Adopsi (Shelter Side)
        Route::post('/pesanan/{id}/confirm', [ShelterController::class, 'confirmOrder'])->name('confirm'); // /pesanan/{id}/confirm
    });

    // --- PROFIL & PEMBAYARAN ---
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/profile/edit', [AuthController::class, 'editProfile'])->name('profile.update'); // /pengguna/editPengguna
});