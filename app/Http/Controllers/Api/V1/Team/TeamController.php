<?php

namespace App\Http\Controllers\Api\V1\Team;

use App\Http\Requests\Team\UpdateTeamRequest;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Team\StoreTeamRequest;
use App\Repositories\TeamRepository;

class TeamController extends Controller
{
    private $teamRepository;
    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }
    public function index()
    {
        return ResponseFormatter::success($this->teamRepository->getAll());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        return ResponseFormatter::success($this->teamRepository->create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return ResponseFormatter::success($this->teamRepository->getById($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, string $id)
    {
        return ResponseFormatter::success($this->teamRepository->update($id, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return ResponseFormatter::success($this->teamRepository->delete($id));
    }
}
