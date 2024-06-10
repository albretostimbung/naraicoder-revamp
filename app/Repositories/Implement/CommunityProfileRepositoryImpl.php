<?php
namespace App\Repositories\Implement;

use App\Models\CommunityProfile;
use App\Repositories\CommunityProfileRepository;

class CommunityProfileRepositoryImpl implements CommunityProfileRepository {
    private $model;

    public function __construct(CommunityProfile $model)
    {
        $this->model = $model;
    }

    public function getFirst()
    {
        return $this->model->first();
    }
}
