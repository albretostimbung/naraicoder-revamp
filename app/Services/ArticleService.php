<?php
namespace App\Services;

use Illuminate\Http\Request;

interface ArticleService
{
    public function create(array $data);
    public function update($id, array $data);
}
