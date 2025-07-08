<?php

namespace App\Http\Controllers\Ministry;

use App\Actions\Ministry\CreateMinistry;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMinistryRequest;
use App\Services\MinistryService;


class CreateMinistryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateMinistryRequest $request, CreateMinistry $createMinistry)
    {

        $data = $createMinistry->execute($request->toDTO());

        return response()->json($data);
    }
}
