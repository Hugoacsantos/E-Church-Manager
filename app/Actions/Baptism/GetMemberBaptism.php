<?php
declare(strict_types=1);


namespace App\Actions\Baptism;

use App\Models\Baptism;

readonly class GetMemberBaptism {


    public function execute(string $id) : Baptism {
       return Baptism::where('membro_id',$id)->first();
    }
}