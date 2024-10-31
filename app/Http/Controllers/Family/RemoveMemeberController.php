<?php

namespace App\Http\Controllers\Family;

use App\DTO\FamilyMemberDTO;
use App\Http\Controllers\Controller;
use App\Services\FamilyService;

class RemoveMemeberController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(FamilyMemberDTO $familyMemberDTO, FamilyService $familyService) {

        $data = $familyService->removemember($familyMemberDTO);

        return response()->json(['message' => 'Usuario removido']);
    }
}
