<?php

namespace App\Services;

use App\DTO\EventDTO;
use App\DTO\EventoDTO;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;


class EventService {


    public function create(EventDTO $eventDTO): Event {
        // Validar a data fazer um evento de pelo menos 30 minutos
        if(empty($eventDTO->status)) {
            $data['status'] = 'Ativo';
        }
        $event = new Event();
        $event->titulo = $eventDTO->titulo;
        $event->descricao = $eventDTO->descricao;
        $event->local = $eventDTO->local;
        $event->data = $eventDTO->data;
        $event->status = $eventDTO->status;
        $event->save();

        return $event;
    }

    public function listAll(): Collection {
        return Event::all();
    }

    public function addMember(User $user, Event $evento): true {
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

        return $evento->save();
    }

    public function removeMember(User $user, Event $evento): true {

        if($evento->status === 'fechado') {
            throw new Exception('Nao foi possivel associar membro a evento devido ao evento esta fechado');
        }

        $userEvento = EventUser::query()
                                ->where('evento_id', $evento->id)
                                ->where('user_id', $user->id)
                                ->get();

        // if($userEvento === false) {
        //     throw new Exception('Usuario ja esta no evento');
        // }

        // $userEvento->delete();

        return $userEvento->delete();
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

    public function findById(string $id): Collection {
       return Event::find($id);
    }



}
