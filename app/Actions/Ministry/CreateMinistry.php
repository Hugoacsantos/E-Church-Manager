<?php
declare(strict_types=1);


namespace App\Actions\Ministry;

use App\DTO\MinistryDTO;
use App\Models\Ministry;

readonly class CreateMinistry {


    public function execute(MinistryDTO $ministryDTO): Ministry {

        if(blank($ministryDTO->status)) {
            $ministryDTO->status = 'Ativo';
        }
        $ministry = new Ministry();
        $ministry->titulo = $ministryDTO->titulo;
        $ministry->descricao = $ministryDTO->descricao;
        $ministry->status = $ministryDTO->status;
        $ministry->save();

        return $ministry;
    }


}