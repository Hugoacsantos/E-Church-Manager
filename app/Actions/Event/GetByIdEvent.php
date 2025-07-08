<?php
declare(strict_types=1);


namespace App\Actions\Event;

use App\Models\Event;

readonly class GetByIdEvent {

    public function execute(string $id): ?Event {
       return Event::find($id);
    }

}