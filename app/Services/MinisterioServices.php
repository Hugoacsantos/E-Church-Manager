<?php

namespace App\Services;

use App\DTO\MinisterioDTO;
use App\Models\Ministerio;
use App\Models\Ministerios_Users;
use Error;

class MinisterioServices {

    public function create(MinisterioDTO $ministerioDTO): string {
        if(!$ministerioDTO) throw new Error('Nao foram passado dados para criação de um novo ministerio');
        if($ministerioDTO->status === '') {
            $ministerioDTO->status = 'Ativo';
        }
        $minister = Ministerio::create($ministerioDTO->toArray());

        return $minister->id;
    }

    public function addMember(int $user_id,int $ministerio_id): bool {
        if(!$user_id and !$ministerio_id) throw new Error('User_id ou Ministerios_id não pode ser vazio');

        $ministerio = Ministerio::find($ministerio_id);

        if(!$ministerio) throw new Error('Ministerio nao existe');
        $ministeriousuario = Ministerios_Users::where('ministerios_id',$ministerio_id)->first();
        if($ministeriousuario->user_id === $user_id) throw new Error('Usuario ja cadastrado no ministerio');

        $ministerio_user = Ministerios_Users::create([
            ''
        ]);

        return true;
    }

    public function findById(string $id): string {

        $ministerio = Ministerio::find($id);
        return $ministerio->id;
    }


}
