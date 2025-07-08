<?php
declare(strict_types=1);


namespace App\Actions\Family;

use App\DTO\FamilyMemberDTO;
use App\Models\FamilyUser;
use Exception;

readonly class AddMember {

        public function execute(FamilyMemberDTO $familyMemberDTO): true {
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


}