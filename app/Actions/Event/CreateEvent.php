<?php
declare(strict_types=1);


namespace App\Actions\Event;

use App\DTO\EventDTO;
use App\Models\Event;
use DateTime;
use Exception;

readonly class CreateEvent {


    public function execute(EventDTO $eventDTO): Event {

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

    private function dateValidation(int $data, int $minutosMinimos = 10): true {
        // $dataFornecida = DateTime::createFromFormat('Y-m-d H:i:s', $data);
        $dataFornecida = date('Y-m-d H:i:s', $data);

        if ($dataFornecida === false) {
            throw new Exception('Data nao passada');
        }
        $hora = date('H:i:s',$data);
        $dataAtual = new DateTime();
        $diferenca = abs(strtotime($hora) - $dataAtual->getTimestamp()) / 60;

        if ($diferenca < $minutosMinimos) {
            throw new Exception("O evento nao pode ter menos de {$minutosMinimos} de duracao");
        }

        return true;
    }

}