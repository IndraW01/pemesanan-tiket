<?php

use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Halaman Film
Route::redirect('/', '/films');

Route::prefix('/films')->name('films.')->group(function() {
    Route::get('/', [FilmController::class, 'index'])->name('index');
    Route::get('/{film:title}', [FilmController::class, 'show'])->name('show');
    Route::get('/{film:title}/schedule', [FilmController::class, 'schedule'])->name('schedule');
});

Route::get('/films/{film:title}/checkout', [FilmController::class, 'chair'])->middleware('auth')->name('films.checkout');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::post('/logout', [LoginController::class, 'logout'])->withoutMiddleware('guest')->middleware('auth')->name('logout.logout');

    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});


// Halaman Dashboard User
Route::prefix('/dashboard/user')->middleware('auth')->name('dashboard.user.')->group(function() {
    Route::get('/', [DashboardUserController::class, 'index'])->name('index');
    Route::get('/profile', [UserController::class, 'index'])->name('profile');

    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');
    Route::post('/wallet', [WalletController::class, 'store'])->name('wallet.store');
    Route::post('/wallet/topup', [WalletController::class, 'topup'])->name('wallet.topup');
});

