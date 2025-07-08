<?php

namespace App\Http\Controllers\Family;

use App\Actions\Family\RemoveMember;
use App\DTO\FamilyMemberDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddMemberFamilyRequest;
use App\Services\FamilyService;

class RemoveMemberController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddMemberFamilyRequest $request,string $id, RemoveMember $removeMember) {

        $family = $request->validated();
        $familyDTO = new FamilyMemberDTO(['familyId' => $id,'userId' => $family['userId']]);
        $removeMember->execute($familyDTO);

        return response()->json(['message' => 'Usuario removido']);
    }
}
