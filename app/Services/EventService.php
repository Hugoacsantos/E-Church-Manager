<?php

namespace App\Services;


use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;


class EventService {



    public function addMember(User $user, Event $evento): EventUser {
        if($evento->status === 'fechado') {
            throw new Exception('Nao foi possivel associar membro a evento devido ao evento esta fechado');
        }


        $userEvento = EventUser::query()
                                ->where('evento_id', $evento->id)
                                ->where('user_id', $user->id)
                                ->exists();



        if($userEvento) {
            throw new Exception('Usuario ja esta no evento');
        }

        $eventUser = new EventUser();
        $eventUser->user_id = $user->id;
        $eventUser->evento_id = $evento->id;
        $eventUser->save();

        return $eventUser;
    }

    public function removeMember(User $user, Event $evento): true {

        if($evento->status === 'fechado') {
            throw new Exception('Nao e possivel remover membro de evento ja fechado');
        }
        // $ue = EventUser::all();
        $userEvento = EventUser::query()
                                ->where('evento_id', $evento->id)
                                ->where('user_id', $user->id)
                                ->first();
        $userEvento->delete();
        return true;
    }

    public function eventsOpen(): Collection {
        return Event::query()
                    ->where('status','ativo')
                    ->get();
    }


    public function eventsClose(): Collection {
        return Event::query()
                    ->where('status','fechado')
                    ->get();
    }

    public function closeEvent(string $evento_id): true{

        // So pode fechar se a data for maior que a data atual
        $evento = Event::find($evento_id);

        if($evento->status == 'fechado') {
            throw new Exception('Evento ja fechado');
        }

        $evento->status = 'fechado';
        return $evento->save();
    }

    public function findById(string|int $id): ?Event {
       return Event::find($id);
    }



}
