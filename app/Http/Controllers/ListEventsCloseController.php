<?php

namespace App\Http\Controllers;

use App\Services\EventosServices;
use Illuminate\Http\Request;

class ListEventsCloseController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $service = new EventosServices;

        $data = $service->eventosFechado();

        return \response()->json($data);
    }
}
