<?php
declare(strict_types=1);


namespace App\Actions\Users;

use App\Models\User;

readonly class FindUserById {

    public function execute(int|string $userId): User {
        return User::find($userId);
    }


}