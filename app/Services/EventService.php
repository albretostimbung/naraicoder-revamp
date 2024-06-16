<?php

namespace App\Services;

interface EventService
{
    public function register(array $data);
    public function delete($id);
}
