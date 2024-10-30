<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFamilyRequest;
use App\Services\FamilyService;

class CreateFamilyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateFamilyRequest $request, FamilyService $familyService)
    {

        $family = $familyService->create($request->toDTO());

        return \response()->json($family);
    }
}
