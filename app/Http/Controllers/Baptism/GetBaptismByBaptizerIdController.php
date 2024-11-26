<?php

namespace App\Http\Controllers\Baptism;

use App\Http\Controllers\Controller;
use App\Services\BaptismService;
use Illuminate\Http\Request;

class GetBaptismByBaptizerIdController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id, BaptismService $baptismService)
    {
        $baptmis = $baptismService->findByBaptizerById($id);

        return response()->json($baptmis);
    }
}
