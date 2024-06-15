<?php

namespace App\Http\Controllers\Api\V1\Member;

use App\Http\Requests\Member\UpdateMemberRequest;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class MemberController extends Controller
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return ResponseFormatter::success($this->userRepository->getAll());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        return ResponseFormatter::success($this->userRepository->getById($id));
    }

    public function update(UpdateMemberRequest $request, string $id)
    {
        return ResponseFormatter::success($this->userRepository->update($id, $request->validated()));
    }

    public function destroy(string $id)
    {
        return ResponseFormatter::success($this->userRepository->delete($id));
    }
}
