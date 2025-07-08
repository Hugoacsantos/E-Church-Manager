<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use App\Models\Family;


class GetFamiliesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $families = Family::all();

        return response()->json($families);
    }
}
