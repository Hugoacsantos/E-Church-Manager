<?php
declare(strict_types=1);


namespace App\Actions\Event;

use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use Exception;

readonly class AddMemberEvent {

    public function execute(User $user, Event $evento): EventUser {
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

}