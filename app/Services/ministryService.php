<?php

namespace App\Services;

use App\DTO\MinisterioDTO;
use App\Models\Ministerio;
use App\Models\Ministerios_Users;
use App\Models\User;
use Exception;

class ministryService {

    public function create(MinisterioDTO $ministerioDTO): Ministerio {

        if(blank($ministerioDTO->status)) {
            $ministerioDTO->status = 'Ativo';
        }
        $ministry = new Ministerio();
        $ministry->titulo = $ministerioDTO->titulo;
        $ministry->descricao = $ministerioDTO->descricao;
        $ministry->status = $ministerioDTO->status;
        $ministry->save();

        return $ministry;
    }

    public function addMember(User $user, Ministerio $ministerio): true {

        $ministryExists = Ministerios_Users::query()
                                            ->where('ministerio_id', $ministerio->id)
                                            ->where('user_id', $user->id)
                                            ->exists();

        if($ministryExists) {
            throw new Exception('Usuario ja cadastrado no ministerio');
        }

        $ministry = new Ministerios_Users();
        $ministry->tipo_usuario = 'Membro';
        $ministry->user_id = $user->id;
        $ministry->ministerio_id = $ministerio->id;
        $ministry->status = 'Ativo';

        return $ministry->save();
    }

    public function removeMember(User $user, Ministerio $ministerio): true {

        $ministryExists = Ministerios_Users::query()
                                            ->where('ministerio_id', $ministerio->id)
                                            ->where('user_id', $user->id)
                                            ->exists();

        if(!$ministryExists) {
            throw new Exception('Usuario nao esta no ministerio');
        }

        $userMinistry = Ministerios_Users::query()
                                            ->where('ministerio_id', $ministerio->id)
                                            ->where('user_id', $user->id)
                                            ->first();

        return $userMinistry->delete();
    }



    public function findById(string $id): Ministerio {
        return Ministerio::find($id);
    }


}
