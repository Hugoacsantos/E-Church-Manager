<?php
declare(strict_types=1);


namespace App\Actions\Address;

use App\Models\Address;

readonly class GetAllAdresses {


    public function execute() {
        return Address::all();
    }



}