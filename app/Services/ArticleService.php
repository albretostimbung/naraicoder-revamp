<?php

namespace App\Services;

interface ArticleService
{
    public function create(array $data);

    public function update($id, array $data);
}
