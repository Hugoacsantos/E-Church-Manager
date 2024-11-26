<?php

namespace App\Http\Controllers\Baptism;

use App\Http\Controllers\Controller;
use App\Services\BaptismService;
use Illuminate\Http\Request;

class GetBaptismByUserIdController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id, BaptismService $baptismService)
    {
        $baptism = $baptismService->findByUserById($id);

        return response()->json($baptism);
    }
}
