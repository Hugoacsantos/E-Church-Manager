<?php

namespace App\Services;

use App\DTO\BatismoDTO;
use App\Models\Batismo;
use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class baptismService {


    public function create(BatismoDTO $batismoDTO): Batismo {
        if(blank($batismoDTO->data_batismo)) {
            $batismoDTO->data_batismo = new DateTime('now');
        }
        // \dd($batismoDTO->toArray());
        // $batismo = Batismo::create($batismoDTO->toArray());
        $baptism = new Batismo();
        $baptism->data_batismo = $batismoDTO->data_batismo;
        $baptism->membro_id = $batismoDTO->membro_id;
        $baptism->batizado_por = $batismoDTO->batizado_por;
        $baptism->save();

        return $baptism;
    }

    public function findById(int $id) : Batismo {
        return Batismo::find($id);
    }

    public function findByUserById(int $id) : Collection{
       return Batismo::where('membro_id',$id)->first();

    }

    public function listAll(): Collection {
        return Batismo::all();
    }

}
