<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::redirect('/', '/films');

Route::prefix('/films')->name('films.')->group(function() {
    Route::get('/', [FilmController::class, 'index'])->name('index');
    Route::get('/{film:title}', [FilmController::class, 'show'])->name('show');
    Route::get('/{film:title}/schedule', [FilmController::class, 'schedule'])->name('schedule');
});

Route::get('/chair', function () {
    echo "tes";
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::post('/logout', [LoginController::class, 'logout'])->withoutMiddleware('guest')->middleware('auth')->name('logout.logout');

    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});
