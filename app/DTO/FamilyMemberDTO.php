<?php

namespace App\DTO;

class FamilyMemberDTO
{

    public string $familyId;
    public string $userId;

    public function __construct(array $data)
    {
        $this->familyId = $data['familyId'];
        $this->userId = $data['userId'];
    }

    public function toArray() {
        return [
            'familyId' => $this->familyId,
            'userId' => $this->userId
        ];
    }

}
