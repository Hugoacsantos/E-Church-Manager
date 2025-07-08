<?php
declare(strict_types=1);


namespace App\Actions\Ministry;

use App\DTO\MinistryDTO;
use App\Models\Ministry;
use App\Models\MinistryUser;
use App\Models\User;
use Exception;

readonly class RemoveMemberMinistry {

    public function execute(User $user, Ministry $ministerio): true {

        $ministryExists = MinistryUser::query()
                                            ->where('ministerio_id', $ministerio->id)
                                            ->where('user_id', $user->id)
                                            ->exists();

        if(!$ministryExists) {
            throw new Exception('Usuario nao esta no ministerio');
        }

        $userMinistry = MinistryUser::query()
                                            ->where('ministerio_id', $ministerio->id)
                                            ->where('user_id', $user->id)
                                            ->first();

        $userMinistry->delete();

        return true;
    }

}