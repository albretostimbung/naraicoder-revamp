<?php

namespace App\Services;

use Illuminate\Http\Request;

interface TeamService
{
    public function create(array $data);

    public function update($id, array $data);
}
