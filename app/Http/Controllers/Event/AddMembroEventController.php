<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMembroEventoRequest;
use App\Services\EventosServices;
use App\Services\EventService;

class AddMembroEventController extends Controller
{
    public function __construct(
        public EventService $eventService
    ) {

    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddMembroEventoRequest $request) {
        [$user_id,$evento_id] = $request->only(['user_id','evento_id']);

        $resultado = $this->eventService->addMember($user_id,$evento_id);

        return \response();
    }
}
