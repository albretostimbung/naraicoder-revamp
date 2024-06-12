<?php

namespace App\Http\Controllers\Api\V1\Event;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;
use App\Http\Requests\Event\StoreEventRequest;
use App\Services\EventService;

class RegisterEventController extends Controller
{
    private $eventService;
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreEventRequest $request)
    {
        return ResponseFormatter::success($this->eventService->register($request->validated()));
    }
}
