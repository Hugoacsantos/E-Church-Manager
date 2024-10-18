<?php

namespace App\Services;

use App\Enum\TipoUserEnum;
use App\Models\TypeUser;
use Illuminate\Database\Eloquent\Collection;

class TypeUserService {

    public function add(string $userId,TipoUserEnum $tipoUsuario = TipoUserEnum::VISITANTE) : TypeUser {
        $tipoUsuario = TypeUser::create($userId,$tipoUsuario->value);
        return $tipoUsuario;
    }

    public function findById(string $id) : Collection {
        return TypeUser::find($id)->get();
    }

    public function findByType(string $tipo): Collection {
        return TypeUser::where('tipo',$tipo)->get();
    }

}
