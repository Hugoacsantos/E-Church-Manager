<?php

namespace App\Http\Controllers\Event;

use App\Actions\Event\CreateEvent;
use App\Actions\Event\GetByIdEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEventoRequest;
use App\Services\EventService;

class CreateEventoController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateEventoRequest $request, CreateEvent $createEvent) {
        
        $evento = $createEvent->execute($request->toDto());

        return response()->json($evento);
    }
}
