<?php

namespace App\Repositories;

interface EventImageRepository
{
    public function insert(array $data);

    public function getById($id);
}
