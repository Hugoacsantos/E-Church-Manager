<?php

namespace App\Http\Controllers\Baptism;

use App\Actions\Baptism\GetMemberBaptism;
use App\Http\Controllers\Controller;
use App\Services\BaptismService;
use Illuminate\Http\Request;

class GetBaptismByUserIdController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id, GetMemberBaptism $getMemberBaptism)
    {
        $baptism = $getMemberBaptism->execute($id);

        return response()->json($baptism);
    }
}
