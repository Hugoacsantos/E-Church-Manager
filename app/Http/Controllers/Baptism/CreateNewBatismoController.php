<?php

namespace App\Http\Controllers\Baptism;

use App\Actions\Baptism\CreateNewBaptism;
use App\Actions\Baptism\IsBaptism;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBastimoRequest;
use App\Services\BaptismService;

class CreateNewBatismoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateBastimoRequest $request, CreateNewBaptism $createNewBaptism, IsBaptism $isBaptism) {
        $userRequest = $request->toDTO();

        $isBaptism->execute($userRequest->membro_id);


        $batismo = $createNewBaptism->execute($userRequest);

        return response()->json(data: $batismo, status:201);
    }
}
