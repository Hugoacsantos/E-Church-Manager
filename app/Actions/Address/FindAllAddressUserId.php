<?php

declare(strict_types=1);


namespace App\Actions\Address;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

readonly class FindAllAddressUserId {

    public function execute(User $user): Collection {
        $address = Address::query()
                            ->where('user_id',$user->id)
                            ->get();

        return $address;
    }

}