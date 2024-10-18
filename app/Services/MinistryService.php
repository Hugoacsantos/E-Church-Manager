<?php

namespace App\Services;

use App\DTO\MinisterioDTO;
use App\DTO\MinistryDTO;
use App\Models\Ministry;
use App\Models\MinistryUser;
use App\Models\User;
use Exception;

class MinistryService {

    public function create(MinistryDTO $ministryDTO): Ministry {

        if(blank($ministryDTO->status)) {
            $ministryDTO->status = 'Ativo';
        }
        $ministry = new Ministry();
        $ministry->titulo = $ministryDTO->titulo;
        $ministry->descricao = $ministryDTO->descricao;
        $ministry->status = $ministryDTO->status;
        $ministry->save();

        return $ministry;
    }

    public function addMember(User $user, Ministry $ministerio): true {

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

    public function removeMember(User $user, Ministry $ministerio): true {

        $ministryExists = MinistryUser::query()
                                            ->where('ministerio_id', $ministerio->id)
                                            ->where('user_id', $user->id)
                                            ->exists();

        if(!$ministryExists) {
            throw new Exception('Usuario nao esta no ministerio');
        }

        $userMinistry = MinistryUser::query()
                                            ->where('ministerio_id', $ministerio->id)
                                            ->where('user_id', $user->id)
                                            ->first();

        return $userMinistry->delete();
    }



    public function findById(string $id): Ministry {
        return Ministry::find($id);
    }


}
