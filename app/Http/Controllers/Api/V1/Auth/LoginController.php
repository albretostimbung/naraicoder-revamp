<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Services\AuthService;
use Illuminate\Http\Response;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

/**
 * @OA\Post(
 *     path="/api/auth/login",
 *     tags={"Auth"},
 *     summary="Login member",
 *     description="Login with the provided credentials",
 *
 *     @OA\RequestBody(
 *         description="Login member",
 *         required=true,
 *
 *         @OA\JsonContent(
 *             type="object",
 *
 *             @OA\Property(
 *                 property="email",
 *                 type="string",
 *                 format="email",
 *                 description="User email"
 *             ),
 *             @OA\Property(
 *                 property="password",
 *                 type="string",
 *                 format="password",
 *                 description="User password"
 *             )
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Login successfully",
 *
 *         @OA\JsonContent(
 *             type="object",
 *
 *             @OA\Property(property="success", type="boolean"),
 *             @OA\Property(property="data")
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=422,
 *         description="Validation error"
 *     )
 * )
 */
class LoginController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $result = $this->authService->login($request->validated());

        if (!$result) {
            return ResponseFormatter::error('Unauthorized', Response::HTTP_UNAUTHORIZED);
        }

        return ResponseFormatter::success($result);

    }
}
