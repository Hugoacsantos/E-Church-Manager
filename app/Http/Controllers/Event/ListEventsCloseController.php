<?php

namespace App\Http\Controllers\Event;

use App\Actions\Event\ListEventClose;
use App\Http\Controllers\Controller;


class ListEventsCloseController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(ListEventClose $listEventClose)
    {
        $data = $listEventClose->execute();

        return response()->json($data);
    }
}
