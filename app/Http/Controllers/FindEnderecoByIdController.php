<?php

namespace App\Http\Controllers;

use App\Services\EnderecoServices;
use Illuminate\Http\Request;

class FindEnderecoByIdController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,string $user_id)
    {
        $enderecoService = new EnderecoServices;

        $endereco = $enderecoService->findById($user_id);

        return \response()->json($endereco);
    }
}
