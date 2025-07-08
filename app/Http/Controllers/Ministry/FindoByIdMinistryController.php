<?php

namespace App\Http\Controllers\Ministry;

use App\Http\Controllers\Controller;
use App\Models\Ministry;
use Illuminate\Http\Request;

class FindoByIdMinistryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $ministryId)
    {
        if(!$ministryId) {
            return response()->json(['error' => 'id nao informado']);
        }

        $ministry = Ministry::find($ministryId);


        return response()->json($ministry, status: 200);
    }
}
