<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1;
use Illuminate\Support\Facades\Route;

// autentikasi
Route::post('/login', V1\Auth\LoginController::class);
Route::post('/users', V1\Auth\RegisterController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/members', V1\Member\MemberController::class);
    Route::apiResource('/partners', V1\Partner\PartnerController::class);
    Route::apiResource('/teams', V1\Team\TeamController::class);
    Route::get('/community-profiles', V1\CommunityProfile\CommunityProfileController::class);

    Route::post('/logout', V1\Auth\LogoutController::class);
});
