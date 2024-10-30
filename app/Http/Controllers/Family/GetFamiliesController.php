<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Services\FamilyService;

class GetFamiliesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(FamilyService $familyService)
    {
        $families = $familyService->listAllFamily();

        return response()->json($families);
    }
}
