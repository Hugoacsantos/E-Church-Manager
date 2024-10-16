<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMembroEventoRequest;
use App\Services\EventosServices;


class AddMembroEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddMembroEventoRequest $request)
    {
        [$user_id,$evento_id] = $request->only(['user_id','evento_id']);

        $services = new EventosServices;

        $resultado = $services->adicionarMembro($user_id,$evento_id);

        if(!$resultado) return \response()->json(['Message'=>'Não foi possivel adicionar o membro']);

        return \response();
    }
}
