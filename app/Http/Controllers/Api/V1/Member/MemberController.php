<?php

namespace App\Http\Controllers\Api\V1\Member;

use App\Http\Requests\Member\UpdateMemberRequest;
use Illuminate\Http\Request;
use App\Services\MemberService;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    private $memberService;
    public function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }
    public function index()
    {
        return ResponseFormatter::success($this->memberService->getAll());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return ResponseFormatter::success($this->memberService->getById($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, string $id)
    {
        return ResponseFormatter::success($this->memberService->update($id, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return ResponseFormatter::success($this->memberService->delete($id));
    }
}
