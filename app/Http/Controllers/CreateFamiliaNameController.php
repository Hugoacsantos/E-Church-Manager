<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFamilia;
use App\Services\FamiliaServices;
use Illuminate\Http\Request;

class CreateFamiliaNameController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateFamilia $request)
    {
        $familiaService = new FamiliaServices;

        $familia = $familiaService->create($request->toDTO());

        return \response()->json($familia);
    }
}
