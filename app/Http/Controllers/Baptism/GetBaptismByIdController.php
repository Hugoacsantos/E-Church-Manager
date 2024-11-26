<?php

namespace App\Http\Controllers\Baptism;

use App\Http\Controllers\Controller;
use App\Services\BaptismService;
use Illuminate\Http\Request;

class GetBaptismByIdController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id, BaptismService $baptismService)
    {
        $baptims = $baptismService->findById($id);

        return response()->json($baptims);
    }
}
