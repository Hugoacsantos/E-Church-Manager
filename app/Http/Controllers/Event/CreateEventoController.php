<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEventoRequest;
use App\Services\EventService;

class CreateEventoController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateEventoRequest $request, EventService $eventService) {

        $evento = $eventService->create($request->toDto());

        return response()->json($evento);
    }
}
