<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([], function () {
    Route::get('/currencies', [\App\Http\Controllers\CurrencyController::class, 'index'])
        ->name('currencies.index');
    Route::get('/currency/{id}', [\App\Http\Controllers\CurrencyController::class, 'show'])
        ->name('currencies.show');
});