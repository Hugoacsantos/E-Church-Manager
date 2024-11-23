<?php

namespace App\Http\Controllers\Ministry;

use App\Http\Controllers\Controller;
use App\Models\Ministry;
use App\Models\User;
use App\Services\MinistryService;
use Exception;
use Illuminate\Http\Request;

class AddLeaderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, MinistryService $ministryService)
    {
        $ministry_id = $request->input('ministry_id');
        $ministry = Ministry::find($ministry_id);
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        if(!$user) {
            throw new Exception('Usuario  nao existe');
        }
        if(!$ministry) {
            throw new Exception('Ministerio nao existe');
        }

        $ministryService->addLeader($user,$ministry);

        return response()->json(['message' => 'Lider Adicionado']);
    }
}
