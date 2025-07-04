<?php
declare(strict_types=1);


namespace App\Actions\Baptism;

use App\DTO\BaptismDTO;
use App\Models\Baptism;
use DateTime;

readonly class CreateNewBaptism {


    public function execute(BaptismDTO $baptismDTO): Baptism {

        if(blank($baptismDTO->data_batismo)) {
            $baptismDTO->data_batismo = new DateTime('now');
        }

        $baptism = new Baptism();
        $baptism->data_batismo = $baptismDTO->data_batismo;
        $baptism->membro_id = $baptismDTO->membro_id;
        $baptism->batizado_por = $baptismDTO->batizado_por;
        $baptism->save();

        return $baptism;
    }


}