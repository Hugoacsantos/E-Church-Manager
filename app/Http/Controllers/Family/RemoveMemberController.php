<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMemberFamilyRequest;
use App\Services\FamilyService;

class RemoveMemberController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddMemberFamilyRequest $addMemberFamilyRequest, FamilyService $familyService) {

        $familyService->removemember($addMemberFamilyRequest->toDTO());

        return response()->json(['message' => 'Usuario removido']);
    }
}
