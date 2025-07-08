<?php

namespace App\Http\Controllers\Ministry;

use App\Actions\Ministry\AddLeaderMember;
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
    public function __invoke(Request $request, AddLeaderMember $addLeaderMember)
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

        $addLeaderMember->execute($user,$ministry);

        return response()->json(['message' => 'Lider Adicionado']);
    }
}
