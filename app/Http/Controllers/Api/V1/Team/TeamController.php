<?php

namespace App\Http\Controllers\Api\V1\Team;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Team\StoreTeamRequest;
use App\Http\Requests\Team\UpdateTeamRequest;
use App\Http\Resources\Team\TeamResource;
use App\Repositories\TeamRepository;
use App\Services\TeamService;

class TeamController extends Controller
{
    private $teamRepository;
    private $teamService;

    public function __construct(TeamRepository $teamRepository, TeamService $teamService)
    {
        $this->teamRepository = $teamRepository;
        $this->teamService = $teamService;
    }

    public function index()
    {
        return ResponseFormatter::success(TeamResource::collection($this->teamRepository->getAll()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        return ResponseFormatter::success(TeamResource::make($this->teamService->create($request->validated())));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return ResponseFormatter::success(TeamResource::make($this->teamRepository->getById($id)));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, string $id)
    {
        return ResponseFormatter::success(TeamResource::make($this->teamService->update($id, $request->validated())));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return ResponseFormatter::success($this->teamRepository->delete($id));
    }
}
