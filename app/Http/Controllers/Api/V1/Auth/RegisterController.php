<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\UserResource;
use App\Services\AuthService;

/**
 * @OA\Post(
 *     path="/api/auth/register",
 *     tags={"Auth"},
 *     summary="Register a new member",
 *     description="Registers a new member with the provided credentials",
 *
 *     @OA\RequestBody(
 *         description="Member registration data",
 *         required=true,
 *
 *         @OA\JsonContent(
 *             type="object",
 *
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="User name"
 *             ),
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
 *             ),
 *             @OA\Property(
 *                 property="password_confirmation",
 *                 type="string",
 *                 format="password",
 *                 description="User password confirmation"
 *             )
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="User registered successfully",
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
class RegisterController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function __invoke(RegisterRequest $request)
    {
        return ResponseFormatter::success(UserResource::make($this->authService->register($request->validated())));
    }
}
