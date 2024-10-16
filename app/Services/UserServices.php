<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Models\User;
use Error;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class UserServices {
    
    /**
     *  Cria um usuario
     */
    public function create(UserDTO $userDTO): int|Error {
        $userAntigo = User::where('email',$userDTO->email)->first();
        if($userAntigo) {
            return throw new Error("Usuario ja cadastrado", 1);
        }
        $user = User::create($userDTO->toArray());

        return $user->id;
    }

    public function getAll(): ?Collection {
        $users = User::all();

        return $users;
    }

    public function findById(int $id): string|Error{
        if(!$id) return throw new Error('Id nao foi enviado');
        $user = User::find($id);

        return $user->tojson();
    }
    
    public function findByEmail(string $email): string|Error{
        if(!$email) return throw new Error('Email nao foi enviado');
        $user = User::where('email',$email)->first();

        if(!$user) return throw new Exception('Email nao foi encontrado');

        return $user->id;
    }

    public function changeName(int $id,string $novoNome) : ?true{
        $userNotFound = User::find($id);
        if($userNotFound) {
            return throw new Error("Usuario nao encontrado", 1);
        }
        $user = User::find($id);
        $user->name = $novoNome;
        $user->save();

        return true;
    }
    
    
}