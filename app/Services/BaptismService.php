<?php

namespace App\Services;

use App\DTO\BaptismDTO;
use App\Models\Baptism;
use App\Models\User;
use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class BaptismService {

    public function findById(int|string $id) : Baptism {
        return Baptism::find($id);
    }

    public function findByUserById(int|string $id) : Baptism {
       return Baptism::where('membro_id',$id)->first();
    }

    public function findByBaptizerById(int|string $id) : Collection {
        return Baptism::where('batizado_por',$id)->get();
     }


}
