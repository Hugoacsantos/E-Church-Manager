<?php

namespace App\Services;

use App\DTO\FamiliaDTO;
use App\DTO\FamilyDTO;
use App\DTO\FamilyMemberDTO;
use App\Models\Family;
use App\Models\FamilyUser;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class FamilyService {


    public function create(FamilyDTO $familyDTO): Family {
        $familia = new Family();
        $familia->nomefamilia = $familyDTO->nomefamilia;
        $familia->status = $familyDTO->status;
        $familia->save();
        return $familia;
    }

    public function listAllFamily(): Collection{
        return Family::all();
    }

    public function findById(int $id): Family{
        return Family::find($id);
    }

    public function addMember(FamilyMemberDTO $familyMemberDTO): true {
        $memberExits = FamilyUser::query()
                                    ->where('familia_id', $familyMemberDTO->familia_id)
                                    ->where('user_id', $familyMemberDTO->user_id)
                                    ->exists();

        if($memberExits) {
            throw new Exception('Usuario ja esta cadastrado na familia');
        }

        $addMemberFamily = new FamilyUser();
        $addMemberFamily->familia_id = $familyMemberDTO->familia_id;
        $addMemberFamily->user_id = $familyMemberDTO->user_id;

        return $addMemberFamily->save();
    }

}
