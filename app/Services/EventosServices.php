<?php

namespace App\Services;

use App\DTO\EventoDTO;
use App\Models\Evento;
use App\Models\EventoUser;
use Illuminate\Database\Eloquent\Collection;
use InvalidArgumentException;

class EventosServices {


    public function create(EventoDTO $eventoDTO) : int {
        if(empty($eventoDTO)) throw new InvalidArgumentException('dados nao passado');
        // Validar a data fazer um evento de pelo menos 30 minutos 
        if(empty($eventoDTO->status)) {
            $data['status'] = 'Ativo';
        }
        $evento = Evento::create($eventoDTO->toArray());

        return $evento->id;
    }

    public function listAll() : Collection {
        $evento = Evento::all();

        return $evento;
    }
    
    public function adicionarMembro(int $user_id, int $evento_id) : true {
        if(!$user_id and !$evento_id) throw new InvalidArgumentException('id de usuario ou id de evento nao enviado');

        $evento = Evento::find($evento_id);

        if(!$evento) throw new InvalidArgumentException('Evento nao existe');

        if($evento->status == 'fechado') throw new InvalidArgumentException('Nao foi possivel associar membro a evento devido ao evento esta fechado');

        $userEvento = EventoUser::create($user_id,$evento_id);

        return true;
    }

    public function removerMembro(int $user_id, int $evento_id) : true {
        if(!$user_id and !$evento_id) throw new InvalidArgumentException('id de usuario ou id de evento nao enviado');

        $evento = Evento::find($evento_id);

        if(!$evento) throw new InvalidArgumentException('Evento nao existe');

        if($evento->status == 'fechado') throw new InvalidArgumentException('Nao foi possivel associar membro a evento devido ao evento esta fechado');

        $userEvento = EventoUser::where('user_id',$user_id)->first();
            
        $userEvento->delete();

        return true;
    }

    public function eventosAberto() : Collection|null{
        $eventos = Evento::where('status','ativo')->get();

        return $eventos;
    }


    public function eventosFechado() : Collection|null {
        $eventos = Evento::where('status','fechado')->get();

        return $eventos;
    }

    public function fecharEvento(string $evento_id) : ?true{

        // So pode fechar se a data for maior que a data atual

        if(!$evento_id) throw new InvalidArgumentException('Id de evento nao pode ser vazio');
        $evento = Evento::find($evento_id);
        if($evento->status == 'fechado') throw new InvalidArgumentException('Evento ja fechado');
        $evento->status = 'fechado';
        $evento->save();

        return true;
    }

    public function findById(string $id): Collection {
        $event = Evento::find($id);

        return $event;
    }

}