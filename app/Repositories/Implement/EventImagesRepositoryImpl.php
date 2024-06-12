<?php
namespace App\Repositories\Implement;

use App\Constants\GlobalConstant;
use App\Models\EventImages;
use App\Repositories\EventImagesRepository;

class EventImagesRepositoryImpl implements EventImagesRepository {
    private $model;

    public function __construct(EventImages $model)
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

        if (!$user) {
            return GlobalConstant::DATA_NOT_FOUND;
        }

        return $user;
    }
}
