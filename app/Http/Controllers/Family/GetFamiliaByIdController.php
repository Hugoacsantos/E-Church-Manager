<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Services\FamilyService;

class GetFamiliaByIdController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id) {

        $family = Family::find($id);


        return \response()->json($family);
    }
}
