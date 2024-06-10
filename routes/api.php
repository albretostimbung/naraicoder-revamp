<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1;
use Illuminate\Support\Facades\Route;

// autentikasi
Route::post('/login', V1\Auth\LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/users', V1\Auth\RegisterController::class);

    Route::apiResource('/members', V1\Member\MemberController::class);

    Route::post('/logout', V1\Auth\LogoutController::class);
});
