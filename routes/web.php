<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
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

Route::get('/', [IndexController::class, 'redirectToCity'])->name('index');
Route::get('/about', [AboutController::class, 'about'])->name('about');

Route::prefix('{slug}')->middleware('set.city')->group(function () {
    Route::get('/', [IndexController::class, 'show'])->name('city.show');
    Route::get('/about', [AboutController::class, 'about'])->name('city.about');
    Route::get('/news', [NewsController::class, 'index'])->name('city.news');
});

