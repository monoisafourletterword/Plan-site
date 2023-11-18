<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalyticsController;
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

Route::get('/', function () {
    return view('index');
})->name('index');
Route::match(['get', 'post'], '/analytics1', [AnalyticsController::class, 'analiz'])->name('analytics1');
Route::match(['get', 'post'], '/analytics2', [AnalyticsController::class, 'analiz2'])->name('analytics2');
Route::get('/seller', function () {
    return view('seller');
})->name('seller');