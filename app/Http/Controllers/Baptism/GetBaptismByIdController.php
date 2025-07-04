<?php

namespace App\Http\Controllers\Baptism;

use App\Actions\Baptism\GetBaptismById;
use App\Http\Controllers\Controller;
use App\Services\BaptismService;
use Illuminate\Http\Request;

class GetBaptismByIdController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id, GetBaptismById $getBaptismById) {
        $baptims = $getBaptismById->execute($id);

        return response()->json($baptims);
    }
}
