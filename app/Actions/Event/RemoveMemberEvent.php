<?php
declare(strict_types=1);


namespace App\Actions\Event;

use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;

readonly class RemoveMemberEvent {


    public function execute(User $user, Event $evento): true {

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

}