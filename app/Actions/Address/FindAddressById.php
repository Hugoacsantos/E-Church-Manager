<?php

declare(strict_types=1);


namespace App\Actions\Address;

use App\Models\Address;

readonly class FindAddressById {

    public function execute(string $id): Address {
        return Address::query()->
                        find($id);
    }

}