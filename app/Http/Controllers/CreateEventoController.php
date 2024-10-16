<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventoRequest;
use App\Services\EventosServices;
use Illuminate\Http\Request;

class CreateEventoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateEventoRequest $request)
    {
        $service = new EventosServices;

        $evento = $service->create($request->toDto());

        return response()->json($evento);
    }
}
