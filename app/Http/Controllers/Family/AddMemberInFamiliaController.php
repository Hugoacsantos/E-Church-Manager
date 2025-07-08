<?php

namespace App\Http\Controllers\Family;

use App\Actions\Family\AddMember;
use App\DTO\FamilyMemberDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddMemberFamilyRequest;

class AddMemberInFamiliaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddMemberFamilyRequest $request, string $id, AddMember $addMemberFamily) {

        $family = $request->validated();
        $familyDTO = new FamilyMemberDTO(['familyId' => $id,'userId' => $family['userId']]);
        $membro = $addMemberFamily->execute($familyDTO);
        

        return response()->json($membro);
    }
}
