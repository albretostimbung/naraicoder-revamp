<?php
namespace App\Services;

use Illuminate\Http\Request;

interface OAuthService
{
    public function googleRedirect();
    public function googleCallback();
}
