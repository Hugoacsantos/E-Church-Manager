<?php

namespace App\Http\Controllers\Event;

use App\Actions\Event\CloseEvent;
use App\Http\Controllers\Controller;
use App\Services\EventService;

class CloseEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $event_id, CloseEvent $closeEvent) {
        $closeEvent->execute($event_id);

        return response()->json(['Message' => 'Evento fechado']);
    }
}
