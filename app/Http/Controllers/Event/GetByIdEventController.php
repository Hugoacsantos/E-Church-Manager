<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Services\EventService;

class GetByIdEventController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id, EventService $eventService)
    {
        $event = $eventService->findById($id);

        return \response()->json($event);
    }
}
