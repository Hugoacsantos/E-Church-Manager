<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use Illuminate\Http\Request;

class RemoveMembroEventoController extends Controller
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
        [$user_id,$event_id] = $request->only(['user_id','event_id']);

        $this->eventService->removeMember($user_id,$event_id);

        return \response()->json('Membro removido');
    }
}
