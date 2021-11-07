<?php

use App\Http\Controllers\FilmController;
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

Route::prefix('/films')->middleware('guest')->name('films.')->group(function() {
    Route::get('/', [FilmController::class, 'index'])->name('index');
    Route::get('/{film:title}', [FilmController::class, 'show'])->name('show');
});
