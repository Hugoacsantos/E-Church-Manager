<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Enum\AppException;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class UserService {

    public function create(UserDTO $userDTO): User {
        $userExists = User::query()
                            ->where('email',$userDTO->email)
                            ->exists();
        if($userExists) {
            throw new Exception(AppException::EMAIL_DE_USUARIO_JA_EXISTE->value);
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
        return User::where('email',$email)->get();
    }

    public function changeName(int $id,string $NewName) : true {
        $user = User::find($id);
        $user->name = $NewName;
        return $user->save();
    }

    public function removeMember(string $userId): true {
        $user = User::find($userId);
        $user->delete();
        return true;
    }

}
