<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use Illuminate\Http\Request;

class ListEventsCloseController extends Controller
{

    public function __construct(
        public EventService $eventService
    ) {

    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = $this->eventService->eventsClose();

        return \response()->json($data);
    }
}
