<?php

namespace App\DTO;

class FamilyMemberDTO
{

    public string $familia_id;
    public string $user_id;

    public function __construct(array $data)
    {
        $this->familia_id = $data['familia_id'];
        $this->user_id = $data['user_id'];
    }


}
