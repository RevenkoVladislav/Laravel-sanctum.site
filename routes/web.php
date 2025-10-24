<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


Auth::routes();

Route::get('/{page}', MainController::class)->where(['page' => '.*']);
