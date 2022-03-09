<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminFilmController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardAdminController;

// Halaman Film
Route::redirect('/', '/films');

Route::prefix('/films')->name('films.')->group(function() {
    Route::get('/', [FilmController::class, 'index'])->name('index');
    Route::get('/{film:title}', [FilmController::class, 'show'])->name('show');
    Route::get('/{film:title}/schedule', [FilmController::class, 'schedule'])->name('schedule');
});

Route::prefix('/films')->name('films.')->middleware('auth')->group(function() {
    Route::get('/{film:title}/checkout', [FilmController::class, 'chair'])->name('checkout');
    Route::post('/{film:title}/store', [FilmController::class, 'store'])->name('store')->middleware('user');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::post('/logout', [LoginController::class, 'logout'])->withoutMiddleware('guest')->middleware('auth')->name('logout.logout');

    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});


// Halaman Dashboard User
Route::prefix('/dashboard/user')->middleware('user')->name('dashboard.user.')->group(function() {
    Route::get('/', [DashboardUserController::class, 'index'])->name('index');
    Route::get('/profile', [UserController::class, 'index'])->name('profile');

    Route::get('booking', [BookingController::class, 'index'])->name('booking');
    Route::post('booking/{booking}', [BookingController::class, 'lunaskan'])->name('booking.lunaskan');
    Route::delete('booking/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');
    Route::get('/booking/{booking}/cetak', [BookingController::class, 'cetak'])->name('booking.cetak');

    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');
    Route::post('/wallet', [WalletController::class, 'store'])->name('wallet.store');
    Route::get('/wallet/{wallet:no_hp}/edit', [WalletController::class, 'edit'])->name('wallet.edit');
    Route::patch('/wallet/{wallet:no_hp}', [WalletController::class, 'update'])->name('wallet.update');
    Route::post('/wallet/topup', [WalletController::class, 'topup'])->name('wallet.topup');
});

// Halaman Dashboard Admin
Route::prefix('/dashboard/admin')->middleware('admin')->name('dashboard.admin.')->group(function() {
    Route::get('/', [DashboardAdminController::class, 'index'])->name('index');
    Route::get('/profile', [UserController::class, 'index'])->name('profile');

    Route::resource('/film', AdminFilmController::class)->names('film')->scoped(['film' => 'title']);
    Route::get('/film/{film:title}/start', [AdminFilmController::class, 'start'])->name('film.start');
});
