<?php

namespace App\Services;

use App\DTO\EventDTO;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Collection;


class EventService {


    public function create(EventDTO $eventDTO): Event {

        if(empty($eventDTO->status)) {
            $eventDTO->status = 'Ativo';
        }
        if($this->dateValidation($eventDTO->data->getTimestamp()) === false) {
            throw new Exception('A data nao pode ser menor que data atual');
        }
        $event = new Event();
        $event->titulo = $eventDTO->titulo;
        $event->descricao = $eventDTO->descricao;
        $event->local = $eventDTO->local;
        $event->data_encerramento = $eventDTO->data;
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

    public function findById(string|int $id): ?Event {
       return Event::find($id);
    }

    private function dateValidation(string $data, int $minutosMinimos = 10): true {

        $dataFornecida = DateTime::createFromFormat('Y-m-d H:i:s', $data);

        if ($dataFornecida === false) {
            throw new Exception('Data nao passada');
        }

        $dataAtual = new DateTime();
        $diferenca = abs($dataFornecida->getTimestamp() - $dataAtual->getTimestamp()) / 60;

        if ($diferenca < $minutosMinimos) {
            throw new Exception("A data nao pode ser no futuro {$minutosMinimos}");
        }

        return true;
    }

}
