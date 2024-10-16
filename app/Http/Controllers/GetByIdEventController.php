<?php

namespace App\Http\Controllers;

use App\Services\EventosServices;
use Illuminate\Http\Request;

class GetByIdEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id)
    {

        $service = new EventosServices;

        $data = $service->findById($id);

        return \response()->json($data);
    }
}
