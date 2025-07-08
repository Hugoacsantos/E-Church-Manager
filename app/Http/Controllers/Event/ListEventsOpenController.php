<?php

namespace App\Http\Controllers\Event;

use App\Actions\Event\ListEventOpen;
use App\Http\Controllers\Controller;

class ListEventsOpenController extends Controller
{


    /**
     * Handle the incoming request.
     */
    public function __invoke(ListEventOpen $listEventOpen) {

        $data = $listEventOpen->execute();

        return response()->json($data);
    }
}
