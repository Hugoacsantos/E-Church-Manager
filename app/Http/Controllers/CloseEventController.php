<?php

namespace App\Http\Controllers;

use App\Services\EventosServices;
use Illuminate\Http\Request;

class CloseEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $event_id)
    {
        $service = new EventosServices;

        $service->fecharEvento($event_id);

        return \response()->json(['Message' => 'Evento fechado']);
    }
}
