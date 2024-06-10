<?php

namespace App\Http\Controllers\Api\V1\Auth;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    private $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        return ResponseFormatter::success($this->authService->register($request->validated()));
    }
}
