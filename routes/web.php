<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(
    function () {
        Route::get('home', [App\Http\Controllers\HorseController::class, 'index']);
        Route::get('/', [App\Http\Controllers\HorseController::class, 'index']);
        Route::resource('betters', App\Http\Controllers\BetterController::class);
        Route::resource('horse', App\Http\Controllers\HorseController::class);
    }
);
