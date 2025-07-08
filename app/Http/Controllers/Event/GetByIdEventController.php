<?php

namespace App\Http\Controllers\Event;

use App\Actions\Event\GetByIdEvent;
use App\Http\Controllers\Controller;
use App\Services\EventService;

class GetByIdEventController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id, GetByIdEvent $getByIdEvent)
    {
        $event = $getByIdEvent->execute($id);

        return \response()->json($event);
    }
}
