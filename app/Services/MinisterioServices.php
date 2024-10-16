<?php

namespace App\Services;

use App\Models\Ministerio;
use App\Models\Ministerios_Users;
use Error;

class MinisterioServices {

    public function create(array $data): string {
        if(!$data) return throw new Error('Nao foram passado dados para criação de um novo ministerio');
        $data['status'] = 'Ativo';
        $minister = Ministerio::create($data);

        return $minister->id;
    }

    public function addMember(array $data): bool {
        if($data === null) return throw new Error('User_id ou Ministerios_id não pode ser vazio');

        $ministerio = Ministerio::find($data['ministerio_id']);

        if(!$ministerio) return new Error('Ministerio nao existe');

        $ministerio_user = Ministerios_Users::create($data);

        return true;
    }  

    public function findById(string $id): string {
    
        $ministerio = Ministerio::find($id);
        return $ministerio->id;
    }
    
    
}