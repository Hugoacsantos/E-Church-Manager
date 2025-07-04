<?php
declare(strict_types=1);


namespace App\Actions\Baptism;

use App\Models\Baptism;

readonly class GetBaptismById {


    public function execute(string $id) : Baptism {
        return Baptism::find($id);
    }


}