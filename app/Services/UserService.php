<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class UserService {

    public function create(UserDTO $userDTO): User {
        $userExists = User::where('email',$userDTO->email)->first();
        if(blank($userExists)) {
            throw new Exception('Usuario ja cadastrado');
        }
        $user = new User();
        $user->name = $userDTO->name;
        $user->email = $userDTO->name;
        $user->password = $userDTO->password;
        $user->save();

        return $user;
    }

    public function getAll(): Collection {
        return User::all();
    }

    public function findById(int $id): User {
        return User::find($id);
    }

    public function findByEmail(string $email): User {
        // if(blank($email)) {
        //     throw new Exception('Email nao foi enviado');
        // }
        // $user = User::where('email',$email)->first();

        // if(blank($user)) {
        //     throw new Exception('Email nao foi encontrado');
        // }
        return User::where('email',$email)->get();
    }

    public function changeName(int $id,string $NewName) : true {
        // $userNotFound = User::find($id);
        // if(blank($userNotFound)) {
        //     throw new Exception('Usuario nao encontrado');
        // }
        $user = User::find($id);
        $user->name = $NewName;
        return $user->save();
    }


}
