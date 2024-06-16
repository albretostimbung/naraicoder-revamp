<?php

namespace App\Http\Controllers\Api\V1\Event;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\EventRepository;
use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Services\EventService;

class EventController extends Controller
{
    private $eventRepository;
    private $eventService;
    public function __construct(EventRepository $eventRepository, EventService $eventService)
    {
        $this->eventRepository = $eventRepository;
        $this->eventService = $eventService;
    }
    public function index()
    {
        return ResponseFormatter::success($this->eventRepository->getAll());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        return ResponseFormatter::success($this->eventService->register($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return ResponseFormatter::success($this->eventRepository->getById($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return ResponseFormatter::success($this->eventRepository->update($id, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return ResponseFormatter::success($this->eventRepository->delete($id));
    }
}
