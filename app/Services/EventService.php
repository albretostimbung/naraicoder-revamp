<?php
namespace App\Services;

use Illuminate\Http\Request;

interface EventService
{
    public function register(array $data);
}
