<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use Illuminate\Http\Request;

class ListEventsOpenController extends Controller
{


    /**
     * Handle the incoming request.
     */
    public function __invoke(EventService $eventService) {

        $data = $eventService->eventsOpen();

        return \response()->json($data);
    }
}
