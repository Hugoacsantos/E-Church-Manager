<?php

declare(strict_types=1);

namespace App\Http\Controllers\Event;

use App\Actions\Event\AddMemberEvent;
use App\Actions\Event\GetByIdEvent;
use App\Actions\Users\FindUserById;
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
    public function __invoke(AddMembroEventoRequest $request, string $eventId, GetByIdEvent $getByIdEvent, AddMemberEvent $addMemberEvent, FindUserById $findUserById) {
        $data =  $request->validated();

        $event_id = $getByIdEvent->execute($eventId);

        if(!$event_id) {
            throw new Exception('Evento nao existe');
        }

        $user_id = $findUserById->execute($data['user_id']);

        if(!$user_id) {
            throw new Exception('Usuario nao existe');
        }

        $addMemberEvent->execute($user_id,$event_id);

        return response()->json(['message'=> 'Membro adicionado']);
    }
}
