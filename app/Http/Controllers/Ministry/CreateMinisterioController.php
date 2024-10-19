<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMinisterio;
use App\Services\MinisterioServices;
use Illuminate\Http\Request;

class CreateMinisterioController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateMinisterio $request)
    {
        $services = new MinisterioServices;

        $data = $services->create($request->toDTO());

        return response()->json($data);
    }
}
