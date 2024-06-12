<?php
namespace App\Repositories;

interface EventImagesRepository {
    public function insert(array $data);
    public function getById($id);
}
