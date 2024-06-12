<?php
namespace App\Services\Implement;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\OAuthService;
use App\Services\ArticleService;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ArticleRepository;
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

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
    }
}
