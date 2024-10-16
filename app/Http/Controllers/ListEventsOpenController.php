<?php

namespace App\Http\Controllers;

use App\Services\EventosServices;
use Illuminate\Http\Request;

class ListEventsOpenController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $services = new EventosServices;

        $data = $services->eventosAberto();

        return \response()->json($data);
    }
}
