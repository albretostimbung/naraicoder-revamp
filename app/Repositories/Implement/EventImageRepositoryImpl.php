<?php

namespace App\Repositories\Implement;

use App\Constants\GlobalConstant;
use App\Models\EventImage;
use App\Repositories\EventImageRepository;

class EventImageRepositoryImpl implements EventImageRepository
{
    private $model;

    public function __construct(EventImage $model)
    {
        $this->model = $model;
    }

    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    public function getById($id)
    {
        $user = $this->model->find($id);

        if (! $user) {
            return GlobalConstant::DATA_NOT_FOUND;
        }

        return $user;
    }
}
