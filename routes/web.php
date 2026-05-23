<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;



// Halaman Home (Menggantikan rute welcome bawaan Laravel)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Detail Event (Contoh dengan ID statis sesuai gambar)
Route::get('/event/1', [EventController::class, 'show'])->name('events.show');

// Checkout & Tiket
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');



Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/events', [AdminEventController::class, 'index'])->name('events.index');

    Route::resource('categories', CategoryController::class);

    Route::resource('partners', PartnerController::class);

});


Route::get('/kontak', function () { return view('contact'); });
Route::get('/profil', function () { return view('profil'); });
Route::get('/katalog', function () { return view('katalog'); });
Route::get('/bantuan', function () { return view('bantuan'); });

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('events', EventAdminController::class);
});
