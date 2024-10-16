<?php

namespace App\Services;

use App\DTO\BatismoDTO;
use App\Models\Batismo;
use DateTime;
use Exception;


use function PHPUnit\Framework\isNull;

class BatismoServices {


    public function create(BatismoDTO $batismoDTO) {
        if(empty($batismoDTO)) throw new Exception('Não foi passado dados para o batismo');
        
        if(isNull($batismoDTO->data_batismo)) {
            $batismoDTO->data_batismo = new DateTime('now');
        }
        // \dd($batismoDTO->toArray());
        $batismo = Batismo::create($batismoDTO->toArray());

        return $batismo;
    }

    public function findById(int $id) {
        $batismo = Batismo::find($id);

        return $batismo;
    }

    public function findByUserById(int $id) {
        $user = Batismo::where('membro_id',$id)->first();

        return $user;
    }

    public function listAll() {
        $lista = Batismo::all();
        return $lista;
    }

}