<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use Illuminate\Http\Request;

class ListEventsCloseController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(EventService $eventService)
    {
        $data = $eventService->eventsClose();

        return \response()->json($data);
    }
}
