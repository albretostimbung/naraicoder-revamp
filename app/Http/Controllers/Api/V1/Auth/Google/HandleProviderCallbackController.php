<?php

namespace App\Http\Controllers\Api\V1\Auth\Google;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Services\OAuthService;
use Illuminate\Http\Request;

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
