<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Halaman Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Event Detail
Route::get('/event/{event}', [EventController::class, 'show'])->name('events.show');

// =======================
// CHECKOUT
// =======================
Route::get('/checkout/{event}', [CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout/{event}', [CheckoutController::class, 'store'])->name('checkout.store');

// Halaman Payment
Route::get('/checkout/payment/{transaction}', [CheckoutController::class, 'payment'])->name('checkout.payment');

// Callback Midtrans
Route::post('/midtrans/callback', [CheckoutController::class, 'callback'])->name('midtrans.callback');

// =======================
// TIKET
// =======================
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

// =======================
// AUTH
// =======================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =======================
// ADMIN
// =======================
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('events', AdminEventController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('partners', PartnerController::class);
    Route::get('transactions', [AdminTransactionController::class, 'index'])->name('transactions.index');
});

// =======================
// HALAMAN STATIS
// =======================
Route::get('/kontak', function () {
    return view('contact');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/katalog', function () {
    return view('katalog');
});

Route::get('/bantuan', function () {
    return view('bantuan');
});

Route::get('/checkout/success/{transaction}', [CheckoutController::class, 'success'])
    ->name('checkout.success');