<?php

namespace App\Http\Controllers\Family;

use App\DTO\FamilyMemberDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddMemberFamilyRequest;
use App\Services\FamilyService;

class AddMemberInFamiliaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddMemberFamilyRequest $request, string $id, FamilyService $familyService) {

        $family = $request->validated();
        $familyDTO = new FamilyMemberDTO(['familyId' => $id,'userId' => $family['userId']]);
        $membro = $familyService->addMember($familyDTO);
        

        return response()->json($membro);
    }
}
