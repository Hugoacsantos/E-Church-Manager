<?php

namespace App\Services;

use App\DTO\BaptismDTO;
use App\Models\Baptism;
use DateTime;
use Illuminate\Database\Eloquent\Collection;

class baptismService {


    public function create(BaptismDTO $baptismDTO): Baptism {
        if(blank($baptismDTO->data_batismo)) {
            $baptismDTO->data_batismo = new DateTime('now');
        }
        // \dd($baptismDTO->toArray());
        // $batismo = Batismo::create($baptismDTO->toArray());
        $baptism = new Baptism();
        $baptism->data_batismo = $baptismDTO->data_batismo;
        $baptism->membro_id = $baptismDTO->membro_id;
        $baptism->batizado_por = $baptismDTO->batizado_por;
        $baptism->save();

        return $baptism;
    }

    public function findById(int $id) : Baptism {
        return Baptism::find($id);
    }

    public function findByUserById(int $id) : Collection{
       return Baptism::where('membro_id',$id)->first();

    }

    public function listAll(): Collection {
        return Baptism::all();
    }

}
