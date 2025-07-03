<?php
declare(strict_types=1);


namespace App\Actions\Users;

use App\Models\User;

readonly class DeleteUser {


    public function execute(string $userId) : bool {
        $user = User::find($userId);
        $user->delete();
        return true;
    }


}