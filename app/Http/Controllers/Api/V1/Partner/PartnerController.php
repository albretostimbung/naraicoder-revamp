<?php

namespace App\Http\Controllers\Api\V1\Partner;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Partner\StorePartnerRequest;
use App\Http\Requests\Partner\UpdatePartnerRequest;
use App\Http\Resources\Partner\PartnerResource;
use App\Repositories\PartnerRepository;

class PartnerController extends Controller
{
    private $partnerRepository;

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
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
        return ResponseFormatter::success(PartnerResource::make($this->partnerRepository->create($request->validated())));
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
        return ResponseFormatter::success(PartnerResource::make($this->partnerRepository->update($id, $request->validated())));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return ResponseFormatter::success($this->partnerRepository->delete($id));
    }
}
