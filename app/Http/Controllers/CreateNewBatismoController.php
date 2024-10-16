<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBastimoRequest;
use App\Services\BatismoServices;
use Illuminate\Http\Request;

class CreateNewBatismoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateBastimoRequest $request)
    {
        $servico = new BatismoServices;

        $batismo = $servico->create($request->toDTO());

        return \response()->json($batismo);
    }
}
