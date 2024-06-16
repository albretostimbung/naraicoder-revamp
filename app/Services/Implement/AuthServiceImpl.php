<?php

namespace App\Services\Implement;

use App\Repositories\UserRepository;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthServiceImpl implements AuthService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function login(array $data)
    {
        if (!Auth::attempt($data)) {
            return false;
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return null;
    }
}
