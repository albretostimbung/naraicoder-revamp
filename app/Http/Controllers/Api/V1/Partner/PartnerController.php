<?php

namespace App\Http\Controllers\Api\V1\Partner;

use Illuminate\Http\Request;
use App\Services\PartnerService;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\PartnerRepository;
use App\Http\Resources\Partner\PartnerResource;
use App\Http\Requests\Partner\StorePartnerRequest;
use App\Http\Requests\Partner\UpdatePartnerRequest;

class PartnerController extends Controller
{
    private $partnerRepository;
    private $partnerService;

    public function __construct(PartnerRepository $partnerRepository, PartnerService $partnerService)
    {
        $this->partnerRepository = $partnerRepository;
        $this->partnerService = $partnerService;
    }

    public function index()
    {
        return ResponseFormatter::success(PartnerResource::collection($this->partnerRepository->getAll()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request)
    {
        return ResponseFormatter::success(PartnerResource::make($this->partnerService->create($request->validated())));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return ResponseFormatter::success(PartnerResource::make($this->partnerRepository->getById($id)));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request, string $id)
    {
        return ResponseFormatter::success(PartnerResource::make($this->partnerService->update($id, $request->validated())));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return ResponseFormatter::success($this->partnerRepository->delete($id));
    }
}
