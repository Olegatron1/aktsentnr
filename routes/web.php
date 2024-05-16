<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CityController;
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

Route::group(['App\Http\Controllers'], function () {
    Route::get('/', [IndexController::class, 'index']);
    Route::get('/about', [AboutController::class, 'about']);
    Route::get('/news', [NewsController::class, 'news']);
    Route::get('/{slug}', [IndexController::class, 'show']);
});
