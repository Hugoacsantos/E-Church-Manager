<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Services\FamilyService;

class GetFamiliaByIdController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id, FamilyService $familyService)
    {
        $family = $familyService->findById($id);


        return \response()->json($family);
    }
}
