<?php
declare(strict_types=1);


namespace App\Actions\Users\TypesUsers;

use App\Models\TypeUser;

readonly class CreateTypeUser {


    public function execute(string $userId, string $typeUser = 'Visitante') : TypeUser {
        $new = new TypeUser();
        $new->user_id = $userId;
        $new->tipo = $typeUser;
        $new->save();
        return $new;
    }

}