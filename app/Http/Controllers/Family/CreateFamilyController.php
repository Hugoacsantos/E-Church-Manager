<?php

namespace App\Http\Controllers\Family;

use App\Actions\Family\CreateFamily;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFamilyRequest;
use App\Services\FamilyService;

class CreateFamilyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateFamilyRequest $request, CreateFamily $createFamily)
    {

        $family = $createFamily->execute($request->toDTO());

        return response()->json($family);
    }
}
