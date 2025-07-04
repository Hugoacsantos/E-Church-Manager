<?php
declare(strict_types=1);


namespace App\Actions\Baptism;

use App\Models\Baptism;
use Illuminate\Database\Eloquent\Collection;

readonly class ListAllBaptism {


    public function execute(): Collection {
        return Baptism::all();
    }


}






