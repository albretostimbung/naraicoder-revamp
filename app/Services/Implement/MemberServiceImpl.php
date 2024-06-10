<?php
namespace App\Services\Implement;

use App\Models\User;
use App\Services\MemberService;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class MemberServiceImpl implements MemberService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function getById($id)
    {
        return $this->userRepository->getById($id);
    }

    public function update($id, array $data)
    {
        return $this->userRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
