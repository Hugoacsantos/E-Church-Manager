<?php

namespace App\Services;

use App\Enum\TipoUserEnum;
use App\Models\TipoUsuario;
use Illuminate\Database\Eloquent\Collection;

class TypeUserService {

    public function add(string $userId,TipoUserEnum $tipoUsuario = TipoUserEnum::VISITANTE) : TipoUsuario {
        $tipoUsuario = TipoUsuario::create($userId,$tipoUsuario->value);
        return $tipoUsuario;
    }

    public function findById(string $id) : Collection {
        return TipoUsuario::find($id)->get();
    }

    public function findByType(string $tipo): Collection {
        return TipoUsuario::where('tipo',$tipo)->get();
    }

}
