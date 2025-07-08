<?php
declare(strict_types=1);


namespace App\Actions\Event;

use App\Models\Event;
use Exception;

readonly class CloseEvent {

    public function execute(string $evento_id): true{

        $evento = Event::find($evento_id);

        if($evento->status == 'fechado') {
            throw new Exception('Evento ja fechado');
        }

        $evento->status = 'fechado';
        return $evento->save();
    }


}