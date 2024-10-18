<?php

namespace App\Services;

use App\DTO\EventoDTO;
use App\Models\Evento;
use App\Models\EventoUser;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;


class EventService {


    public function create(EventoDTO $eventoDTO): Evento {
        // Validar a data fazer um evento de pelo menos 30 minutos
        if(empty($eventoDTO->status)) {
            $data['status'] = 'Ativo';
        }
        $event = new Evento();
        $event->titulo = $eventoDTO->titulo;
        $event->descricao = $eventoDTO->descricao;
        $event->local = $eventoDTO->local;
        $event->status = $eventoDTO->status;
        $event->save();

        return $event;
    }

    public function listAll(): Collection {
        return Evento::all();
    }

    public function adicionarMembro(User $user, Evento $evento): true {
        if($evento->status === 'fechado') {
            throw new Exception('Nao foi possivel associar membro a evento devido ao evento esta fechado');
        }

        $userEvento = EventoUser::query()
                                ->where('evento_id', $evento->id)
                                ->where('user_id', $user->id)
                                ->exists();

        if($userEvento) {
            throw new Exception('Usuario ja esta no evento');
        }

        $eventUser = new EventoUser();
        $eventUser->user_id = $user->id;
        $eventUser->evento_id = $evento->id;

        return $evento->save();
    }

    public function removerMembro(User $user, Evento $evento): true {

        if($evento->status === 'fechado') {
            throw new Exception('Nao foi possivel associar membro a evento devido ao evento esta fechado');
        }

        $userEvento = EventoUser::query()
                                ->where('evento_id', $evento->id)
                                ->where('user_id', $user->id)
                                ->get();

        // if($userEvento === false) {
        //     throw new Exception('Usuario ja esta no evento');
        // }

        // $userEvento->delete();

        return $userEvento->delete();
    }

    public function eventosAberto(): Collection {
        return Evento::query()
                    ->where('status','ativo')
                    ->get();
    }


    public function eventosFechado(): Collection {
        return Evento::query()
                    ->where('status','fechado')
                    ->get();
    }

    public function fecharEvento(string $evento_id): true{

        // So pode fechar se a data for maior que a data atual
        $evento = Evento::find($evento_id);

        if($evento->status == 'fechado') {
            throw new Exception('Evento ja fechado');
        }

        $evento->status = 'fechado';
        return $evento->save();
    }

    public function findById(string $id): Collection {
       return Evento::find($id);
    }



}
