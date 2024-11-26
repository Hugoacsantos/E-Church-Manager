<?php

namespace App\Services;

use App\DTO\BaptismDTO;
use App\Models\Baptism;
use App\Models\User;
use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class BaptismService {


    public function create(BaptismDTO $baptismDTO): Baptism {

        if( $this->isBaptism($baptismDTO->membro_id) ===true) {
            throw new Exception('Usuario ja é batizado');
        }

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

    public function findById(int|string $id) : Baptism {
        return Baptism::find($id);
    }

    public function findByUserById(int|string $id) : Baptism {
       return Baptism::where('membro_id',$id)->first();
    }

    public function findByBaptizerById(int|string $id) : Collection {
        return Baptism::where('batizado_por',$id)->get();
     }

    public function listAll(): Collection {
        return Baptism::all();
    }

    private function isBaptism(string $userId): bool {
        $user = User::find($userId);

        $ifBaptism = Baptism::query()
                                ->where('membro_id',$userId)
                                ->first();

        if($ifBaptism > 0) {
            return true;
        }
        return false;
    }

}
