<?php

namespace App\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

use App\DTO\FamilyDTO;
use App\DTO\FamilyMemberDTO;
use App\Models\Family;
use App\Models\FamilyUser;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class FamilyService {


    public function create(FamilyDTO $familyDTO): Family {
        $familia = new Family();
        $familia->nomefamilia = $familyDTO->name;
        $familia->status = $familyDTO->status;
        $familia->save();
        return $familia;
    }

    public function listAllFamily(): Collection {
        return Family::all();
    }

    public function findById(string $id): Family {
        return Family::find($id);
    }

    public function addMember(FamilyMemberDTO $familyMemberDTO): true {
        $memberExits = FamilyUser::query()
                                    ->where('family_id', $familyMemberDTO->familyId)
                                    ->where('user_id', $familyMemberDTO->userId)
                                    ->exists();

        if($memberExits) {
            throw new Exception('Usuario ja esta cadastrado na familia');
        }

        $addMemberFamily = new FamilyUser();
        $addMemberFamily->family_id = $familyMemberDTO->familyId;
        $addMemberFamily->user_id = $familyMemberDTO->userId;

        return $addMemberFamily->save();
    }

    public function removemember(FamilyMemberDTO $familyMemberDTO): true {
        $memberExits = FamilyUser::query()
                                        ->where('family_id', $familyMemberDTO->familyId)
                                        ->where('user_id', $familyMemberDTO->userId)
                                        ->first();

        if (!$memberExits) {
            throw new Exception('Usuário não está cadastrado na família');
        }

        return $memberExits->delete();
    }

}
