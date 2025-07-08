<?php
declare(strict_types=1);


namespace App\Actions\Ministry;

use App\Models\Ministry;
use App\Models\MinistryUser;
use App\Models\User;
use Exception;

readonly class AddMemberMinistry {

    
    public function execute(User $user, Ministry $ministerio): true {

        $ministryExists = MinistryUser::query()
                                            ->where('ministerio_id', $ministerio->id)
                                            ->where('user_id', $user->id)
                                            ->exists();

        if($ministryExists) {
            throw new Exception('Usuario ja cadastrado no ministerio');
        }

        $ministry = new MinistryUser();
        $ministry->tipo_usuario = 'Membro';
        $ministry->user_id = $user->id;
        $ministry->ministerio_id = $ministerio->id;
        $ministry->status = 'Ativo';

        return $ministry->save();
    }


}