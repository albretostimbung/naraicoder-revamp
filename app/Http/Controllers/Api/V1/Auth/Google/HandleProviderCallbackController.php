<?php

namespace App\Http\Controllers\Api\V1\Auth\Google;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\OAuthService;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class HandleProviderCallbackController extends Controller
{
    private $oauthService;

    public function __construct(OAuthService $oauthService)
    {
        $this->oauthService = $oauthService;
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return ResponseFormatter::success($this->oauthService->googleCallback());
    }
}
