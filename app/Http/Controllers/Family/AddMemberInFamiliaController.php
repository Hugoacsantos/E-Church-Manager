<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMemberFamilyRequest;
use App\Services\FamilyService;

class AddMemberInFamiliaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddMemberFamilyRequest $request, FamilyService $familyService) {

        $membro = $familyService->addMember($request->toDTO());


        return response()->json($membro);
    }
}
