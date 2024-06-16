<?php

namespace App\Http\Controllers\Api\V1\Member;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Member\UpdateMemberRequest;
use App\Http\Resources\Member\MemberResource;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return ResponseFormatter::success(MemberResource::collection($this->userRepository->getAll()));
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
        return ResponseFormatter::success(MemberResource::make($this->userRepository->getById($id)));
    }

    public function update(UpdateMemberRequest $request, string $id)
    {
        return ResponseFormatter::success(MemberResource::make($this->userRepository->update($id, $request->validated())));
    }

    public function destroy(string $id)
    {
        return ResponseFormatter::success($this->userRepository->delete($id));
    }
}
