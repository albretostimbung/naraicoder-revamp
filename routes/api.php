<?php
/**
 * @OA\Info(
 *     title="API Documentation",
 *     version="1.0.0"
 * )
 */

use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    // autentikasi
    Route::post('/login', V1\Auth\LoginController::class);
    Route::post('/register', V1\Auth\RegisterController::class);

    // autentikasi google
    Route::get('/google/login', V1\Auth\Google\RedirectUrlController::class);
    Route::get('/google/callback', V1\Auth\Google\HandleProviderCallbackController::class);

    Route::post('/logout', V1\Auth\LogoutController::class)->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/articles', V1\Article\ArticleController::class);

    Route::apiResource('/events', V1\Event\EventController::class);

    Route::apiResource('/members', V1\Member\MemberController::class);
    Route::apiResource('/partners', V1\Partner\PartnerController::class);
    Route::apiResource('/teams', V1\Team\TeamController::class);
    Route::get('/community-profiles', V1\CommunityProfile\CommunityProfileController::class);
});
