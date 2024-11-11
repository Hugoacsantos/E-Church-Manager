<?php

namespace App\Http\Controllers\Baptism;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBastimoRequest;
use App\Services\BaptismService;

class CreateNewBatismoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateBastimoRequest $request, BaptismService $baptismService) {

        $batismo = $baptismService->create($request->toDTO());

        return \response()->json($batismo);
    }
}
