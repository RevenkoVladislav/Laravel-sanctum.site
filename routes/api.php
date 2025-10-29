<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('posts')->group(function () {
   Route::post('/store', StoreController::class);
    Route::get('/get', IndexController::class);
})->middleware('auth:sanctum');
