<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Services\EventService;

class GetByIdEventController extends Controller
{
    public function __construct(
        public EventService $eventService
    ) {

    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id)
    {
        $event = $this->eventService->findById($id);

        return \response()->json($event);
    }
}
