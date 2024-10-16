<?php

namespace App\Services;

use App\DTO\FamiliaDTO;
use App\DTO\MembroFamiliaDTO;
use App\Models\Familia;
use App\Models\FamiliaUser;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class FamiliaServices {
    

    public function create(FamiliaDTO $familiaDTO) : ?string {
        if(empty($familiaDTO)) throw new Exception('Nome de familia nao foi passado');

        $familia = Familia::create($familiaDTO->toArray());

        return $familia;
    }

    public function listAllFamily(): ?Collection{
        $familias = Familia::all();
        return $familias;
    }

    public function findById(int $id) : ?Collection{
        $familia = Familia::find($id);

        return $familia;
    }

    public function addMember(MembroFamiliaDTO $membroFamiliaDTO) : ?bool {
        $family = FamiliaUser::create($membroFamiliaDTO->familia_id,$membroFamiliaDTO->user_id);

        return true;
    }

}