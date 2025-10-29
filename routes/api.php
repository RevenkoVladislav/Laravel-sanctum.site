<?php

use App\Http\Controllers\GetController;
use App\Http\Controllers\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
   Route::get('/get', GetController::class);
});

Route::prefix('posts')->group(function () {
   Route::post('/store', StoreController::class);
});
