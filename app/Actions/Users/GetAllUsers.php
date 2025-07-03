<?php
declare(strict_types=1);


namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

readonly class GetAllUsers {

    public function execute(int $perPage = 20, int $page = 1) {

        $users = User::paginate(perPage: $perPage,page:$page);
        return $users;
    }


}