<?php

namespace App\Services;

interface OAuthService
{
    public function googleRedirect();

    public function googleCallback();
}
