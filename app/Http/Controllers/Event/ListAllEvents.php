<?php

namespace App\Http\Controllers\Event;

use App\Actions\Event\ListAllEvents as EventListAllEvents;
use App\Http\Controllers\Controller;


class ListAllEvents extends Controller
{ 
    /**
     * Handle the incoming request.
     */
    public function __invoke(EventListAllEvents $listAllEvents) {

        $data = $listAllEvents->execute();

        return \response()->json($data);
    }
}
