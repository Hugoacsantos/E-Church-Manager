<?php

declare(strict_types=1);

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMembroEventoRequest;
use App\Services\EventService;
use App\Services\UserService;
use Exception;

class AddMembroEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddMembroEventoRequest $request, EventService $eventService, UserService $userService) {
        $data =  $request->only(['user_id','event_id']);

        $event_id = $eventService->findById($data['event_id']);

        if(!$event_id) {
            throw new Exception('Evento nao existe');
        }

        $user_id = $userService->findById($data['user_id']);

        if(!$user_id) {
            throw new Exception('Usuario nao existe');
        }

        $eventService->addMember($user_id,$event_id);

        return \response()->json(['message'=> 'Membro adicionado']);
    }
}
