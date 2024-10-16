<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEnderecoRequest;
use App\Services\EnderecoServices;
use Illuminate\Http\Request;

class CreateEndereco extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateEnderecoRequest $request)
    {
        $enderecoService = new EnderecoServices;

        $endereco = $enderecoService->create($request->toDTO());


        return \response()->json($endereco);
    }
}
