<?php
declare(strict_types=1);


namespace App\Actions\Users;

use App\DTO\UserDTO;
use App\Models\User;
use Exception;


readonly class CreateUser {

    public function execute(UserDTO $userDTO): User {
        $userExists = User::query()
            ->where('email', $userDTO->email)
            ->exists();
        if ($userExists) {
            throw new Exception("E-mail de usuario já existe");
        }
        $user = new User();
        $user->name = $userDTO->name;
        $user->email = $userDTO->email;
        $user->password = $userDTO->password;
        $user->save();

        return $user;
    }
}
