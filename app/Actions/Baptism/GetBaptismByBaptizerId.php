<?php
declare(strict_types=1);


namespace App\Actions\Baptism;

use App\Models\Baptism;
use Illuminate\Database\Eloquent\Collection;

readonly class GetBaptismByBaptizerId {


    public function execute(string $id) : Collection {
       return Baptism::where('batizado_por',$id)->get();;
    }
}