<?php

namespace App\Http\Controllers\Address;

use App\Actions\Address\FindAddressById;
use App\Http\Controllers\Controller;


class FindAddressController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id, FindAddressById $findAddressById) {
        $endereco = $findAddressById->execute($id);
        return response()->json($endereco);
    }
}
