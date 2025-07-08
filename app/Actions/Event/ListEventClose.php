<?php
declare(strict_types=1);


namespace App\Actions\Event;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

readonly class ListEventClose {

    public function execute(): Collection {
        return Event::query()
                    ->where('status','fechado')
                    ->get();
    }


}