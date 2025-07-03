<?php

namespace App\Http\Controllers\Family;

use App\DTO\FamilyMemberDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddMemberFamilyRequest;
use App\Services\FamilyService;

class RemoveMemberController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddMemberFamilyRequest $request,string $id, FamilyService $familyService) {

        $family = $request->validated();
        $familyDTO = new FamilyMemberDTO(['familyId' => $id,'userId' => $family['userId']]);
        $familyService->removemember($familyDTO);

        return response()->json(['message' => 'Usuario removido']);
    }
}
