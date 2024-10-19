<?php

namespace App\Http\Controllers\Baptism;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBastimoRequest;
use App\Services\baptismService;
use App\Services\BatismoServices;
use Illuminate\Http\Request;

class CreateNewBatismoController extends Controller
{

    public function __construct(
        public baptismService $baptismService
    ) {

    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateBastimoRequest $request) {
        $batismo = $this->baptismService->create($request->toDTO());

        return \response()->json($batismo);
    }
}
