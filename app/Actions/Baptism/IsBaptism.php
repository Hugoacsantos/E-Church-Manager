<?php
declare(strict_types=1);


namespace App\Actions\Baptism;

use App\Models\Baptism;
use App\Models\User;

readonly class IsBaptism {

    public function execute(string $userId): bool {
        $user = User::find($userId);

        $ifBaptism = Baptism::query()
                                ->where('membro_id',$userId)
                                ->first();

        if($ifBaptism > 0) {
            return true;
        }
        return false;
    }


}





