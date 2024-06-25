<?php

namespace App\Services;

use Illuminate\Http\Request;

interface AuthService
{
    public function register(array $data);

    public function login(array $data);

    public function loginAdmin(array $data);

    public function logout(Request $request);
}
