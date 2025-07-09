<?php

namespace App\Http\Controllers\Participations;

use App\Http\Controllers\Controller;
use App\Models\ParticipationHistory;
use Illuminate\Http\Request;

class ListEventParticipationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $eventId) {

        $participation = ParticipationHistory::
                                            query()
                                            ->where('event_id','=', $eventId)->get();
        if(!$participation) {
            return response()->json(['error' => 'id de evento nao existe']);
        }

        return response()->json([$participation],status:200);
    }   
}
