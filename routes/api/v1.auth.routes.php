<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::controller(AuthController::class)
    ->name('auth.')->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
    });
