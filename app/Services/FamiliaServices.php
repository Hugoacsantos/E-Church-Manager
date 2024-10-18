<?php

namespace App\Services;

use App\DTO\FamiliaDTO;
use App\DTO\MembroFamiliaDTO;
use App\Models\Familia;
use App\Models\FamiliaUser;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class FamilyService {


    public function create(FamiliaDTO $familiaDTO): Familia {
        $familia = new Familia();
        $familia->nomefamilia = $familiaDTO->nomefamilia;
        $familia->status = $familiaDTO->status;
        $familia->save();
        return $familia;
    }

    public function listAllFamily(): Collection{
        return Familia::all();
    }

    public function findById(int $id): Familia{
        return Familia::find($id);
    }

    public function addMember(MembroFamiliaDTO $membroFamiliaDTO): true {
        $memberExits = FamiliaUser::query()
                                    ->where('familia_id', $membroFamiliaDTO->familia_id)
                                    ->where('user_id', $membroFamiliaDTO->user_id)
                                    ->exists();

        if($memberExits) {
            throw new Exception('Usuario ja esta cadastrado na familia');
        }

        $addMemberFamily = new FamiliaUser();
        $addMemberFamily->familia_id = $membroFamiliaDTO->familia_id;
        $addMemberFamily->user_id = $membroFamiliaDTO->user_id;

        return $addMemberFamily->save();
    }

}
