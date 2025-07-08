<?php
declare(strict_types=1);


namespace App\Actions\Family;

use App\DTO\FamilyMemberDTO;
use App\Models\FamilyUser;
use Exception;

readonly class RemoveMember {

        public function execute(FamilyMemberDTO $familyMemberDTO): true {
        $memberExits = FamilyUser::query()
                                        ->where('family_id', $familyMemberDTO->familyId)
                                        ->where('user_id', $familyMemberDTO->userId)
                                        ->first();

        if (!$memberExits) {
            throw new Exception('Usuário não está cadastrado na família');
        }
        $memberExits->delete();
        return true;
    }

}