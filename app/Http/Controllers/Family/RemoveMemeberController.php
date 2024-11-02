<?php

namespace App\Http\Controllers\Family;

use App\DTO\FamilyMemberDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddMemberFamilyRequest;
use App\Services\FamilyService;
use Illuminate\Http\Request;

class RemoveMemeberController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddMemberFamilyRequest $addMemberFamilyRequest, FamilyService $familyService) {
        dd($addMemberFamilyRequest->toDTO());
        $familyService->removemember($familyMemberDTO);

        return response()->json(['message' => 'Usuario removido']);
    }
}
