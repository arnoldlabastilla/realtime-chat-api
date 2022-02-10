<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth
Route::prefix('auth')->group(function () {
    Route::post('login', [App\Http\Controllers\Api\Auth\LoginController::class, 'login']);
});

Route::prefix('messages')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\MessageController::class, 'index']);
    Route::post('/', [App\Http\Controllers\Api\MessageController::class, 'store']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
