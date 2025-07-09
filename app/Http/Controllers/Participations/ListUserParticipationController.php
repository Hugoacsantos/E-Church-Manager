<?php

namespace App\Http\Controllers\Participations;

use App\Http\Controllers\Controller;
use App\Models\ParticipationHistory;
use Illuminate\Http\Request;


class ListUserParticipationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $userId) {

        $participation = ParticipationHistory::
                                            query()
                                            ->where('member_id','=', $userId)->get();
        if(!$participation) {
            return response()->json(['error' => 'id de usuario nao existe']);
        }
        return response()->json($participation,status:200);
    }
}
