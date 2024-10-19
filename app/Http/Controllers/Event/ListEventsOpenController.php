<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use Illuminate\Http\Request;

class ListEventsOpenController extends Controller
{

    public function __construct(
        public EventService $eventService
    ) {

    }

    /**
     * Handle the incoming request.
     */
    public function __invoke() {

        $data = $this->eventService->eventsOpen();

        return \response()->json($data);
    }
}
