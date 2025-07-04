<?php

namespace App\Http\Controllers\Baptism;

use App\Actions\Baptism\GetBaptismByBaptizerId;
use App\Http\Controllers\Controller;
use App\Services\BaptismService;
use Illuminate\Http\Request;

class GetBaptismByBaptizerIdController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id, GetBaptismByBaptizerId $getBaptismByBaptizerId)
    {
        $baptmis = $getBaptismByBaptizerId->execute($id);

        return response()->json($baptmis);
    }
}
