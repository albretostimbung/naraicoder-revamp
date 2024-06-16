<?php

namespace App\Repositories\Implement;

use App\Constants\GlobalConstant;
use App\Models\Partner;
use App\Repositories\PartnerRepository;

class PartnerRepositoryImpl implements PartnerRepository
{
    private $model;

    public function __construct(Partner $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        $user = $this->model->find($id);

        if (! $user) {
            return GlobalConstant::DATA_NOT_FOUND;
        }

        return $user;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $user = $this->model->find($id);

        if (! $user) {
            return GlobalConstant::DATA_NOT_FOUND;
        }

        $user->update($data);

        return $user;
    }

    public function delete($id)
    {
        $user = $this->model->find($id);

        if (! $user) {
            return GlobalConstant::DATA_NOT_FOUND;
        }

        $user->delete();

        return null;
    }
}
