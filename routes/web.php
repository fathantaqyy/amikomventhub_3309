<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\AuthController; // ⬅️ TAMBAHKAN INI
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;

/*
|--------------------------------------------------------------------------
| Sisi Pengguna Umum (Public Routes)
|--------------------------------------------------------------------------
*/
// Halaman Utama & Katalog Informasi
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/1', [EventController::class, 'show'])->name('events.show');
Route::get('/kontak', function () { return view('contact'); })->name('contact');
Route::get('/profil', function () { return view('profil'); })->name('profil');
Route::get('/katalog', function () { return view('katalog'); })->name('katalog');
Route::get('/bantuan', function () { return view('bantuan'); })->name('bantuan');

// Checkout & Tiket
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');


/*
|--------------------------------------------------------------------------
| Sisi Administrator (Admin Routes) - SUDAH DIGABUNG & TERPROTEKSI
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    
    // 1️⃣ TAMBAHKAN: Rute Guest (Hanya bisa diakses jika BELUM login)
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.post');
    });

    // 2️⃣ TAMBAHKAN: Rute Terproteksi Middleware (Wajib LOGIN & Wajib ADMIN)
    Route::middleware(['auth', 'admin'])->group(function () {
        
        // Halaman Dashboard Utama Admin
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        // Manajemen Data Master (Menggunakan Resource)
        Route::resource('events', AdminEventController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('partners', PartnerController::class);

        // TAMBAHKAN: Aksi Keluar Sistem (Logout)
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
});