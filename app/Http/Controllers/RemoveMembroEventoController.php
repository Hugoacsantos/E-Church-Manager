<?php

namespace App\Http\Controllers;

use App\Services\EventosServices;
use Illuminate\Http\Request;

class RemoveMembroEventoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        [$user_id,$event_id] = $request->only(['user_id','event_id']);
        $service = new EventosServices;

        $service->removerMembro($user_id,$event_id);


        return \response()->json('Membro removido');
    }
}
