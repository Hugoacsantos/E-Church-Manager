<?php

namespace App\Http\Controllers\Event;

use App\Actions\Event\GetByIdEvent;
use App\Actions\Event\RemoveMemberEvent;
use App\Actions\Users\FindUserById;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddMembroEventoRequest;
use Exception;


class RemoveMembroEventoController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddMembroEventoRequest $request,string $eventId, FindUserById $findUserById, GetByIdEvent $getByIdEvent, RemoveMemberEvent $removeMemberEvent)
    {
        $data =  $request->validated();

        $event_id = $getByIdEvent->execute($eventId);

        if(!$event_id) {
            throw new Exception('Evento nao existe');
        }

        $user_id = $findUserById->execute($data['user_id']);

        if(!$user_id) {
            throw new Exception('Usuario nao existe');
        }

        $removeMemberEvent->execute($user_id,$event_id);

        return \response()->json('Membro removido');
    }
}
