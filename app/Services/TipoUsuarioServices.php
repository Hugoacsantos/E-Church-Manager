<?php 

namespace App\Services;

use App\Enum\TipoUserEnum;
use App\Models\TipoUsuario;
use Error;
use Illuminate\Database\Eloquent\Collection;

class TipoUsuarioServices {
    

    public function add(string $id,TipoUserEnum $tipoUsuario = TipoUserEnum::VISITANTE) : string|Error {
        if(!$id) throw new Error('Id de usuario nao pode ser vazio');
        
        $tipoUsuario = TipoUsuario::create($id,$tipoUsuario->value);

    
        return $tipoUsuario->id;
    }

    public function createNewType(array $data): int|Error {
        if(!$data) return new Error('Não foi enviado um tipo de usuario');
        $typeData = TipoUsuario::where('tipo','=',$data['tipo'])->first();
        if($typeData) return new Error('Tipo ja existe');
        $novoTipo = TipoUsuario::create();
    }

    public function findById(string $id) : Collection|Error {
        if(!$id) return throw new Error('Id nao pode ser vazio ao criar um tipo de usuario');

        $tipo = TipoUsuario::find($id);

        return $tipo;
    }

    public function findByType(string $tipo): ?Collection {
        $tipos = TipoUsuario::where('tipo',$tipo)->get();

        return $tipos;
    }

}