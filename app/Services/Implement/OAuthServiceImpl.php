<?php

namespace App\Services\Implement;

use App\Models\User;
use App\Services\OAuthService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OAuthServiceImpl implements OAuthService
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->stateless()->redirect()->getTargetUrl();
    }

    public function googleCallback()
    {
        $callback = Socialite::driver('google')->stateless()->user();
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'avatar' => $callback->getAvatar(),
            'email_verified_at' => now(),
        ];

        $user = User::firstOrCreate([
            'email' => $callback->getEmail(),
        ], $data);
        Auth::login($user, true);

        $token = Auth::user()->createToken('auth_token')->plainTextToken;

        return config('services.frontend.app_url') . '/callback?access_token=' . urlencode($token);
    }
}
