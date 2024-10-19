<?php

namespace App\Http\Controllers;

use App\Services\FamiliaServices;
use Illuminate\Http\Request;

class GetFamiliaByIdController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id)
    {
        $service = new FamiliaServices;

        $familia = $service->findById($id);


        return \response()->json($familia);
    }
}
