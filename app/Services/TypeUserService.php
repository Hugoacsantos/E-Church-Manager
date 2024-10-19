<?php

namespace App\Services;

use App\Enum\TypeUser as EnumTypeUser;
use App\Models\TypeUser;
use Illuminate\Database\Eloquent\Collection;

class TypeUserService {

    public function add(string $userId, EnumTypeUser $typeUser = EnumTypeUser::VISITANTE): TypeUser {

        $new = new TypeUser();
        $new->user_id = $userId;
        $new->tipo = $typeUser->value;
        $new->save();
        return $new;
    }

    public function findById(string $id) : Collection {
        return TypeUser::find($id)->get();
    }

    public function findByType(string $tipo): Collection {
        return TypeUser::where('tipo',$tipo)->get();
    }

}
