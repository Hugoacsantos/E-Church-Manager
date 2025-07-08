<?php
declare(strict_types=1);


namespace App\Actions\Family;

use App\DTO\FamilyDTO;
use App\Models\Family;

readonly class CreateFamily {

    public function execute(FamilyDTO $familyDTO): Family {
        $familia = new Family();
        $familia->nomefamilia = $familyDTO->name;
        $familia->status = $familyDTO->status;
        $familia->save();
        return $familia;
    }


}