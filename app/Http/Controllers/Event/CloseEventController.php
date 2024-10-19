<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Services\EventService;

class CloseEventController extends Controller
{

    public function __construct(
        public EventService $eventService
    ) {

    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $event_id) {
        $this->eventService->closeEvent($event_id);

        return \response()->json(['Message' => 'Evento fechado']);
    }
}
