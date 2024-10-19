<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use Illuminate\Http\Request;

class ListAllEvents extends Controller
{

    public function __construct(
        public EventService $eventService
    ) {

    }
    /**
     * Handle the incoming request.
     */
    public function __invoke() {

        $data = $this->eventService->listAll();

        return \response()->json($data);
    }
}
