<?php

namespace App\Http\Controllers\Address;

use App\Actions\Address\GetAllAdresses;
use App\Http\Controllers\Controller;
use App\Services\AddressService;
use Illuminate\Http\Request;

class GetAddressesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(GetAllAdresses $getAllAdresses)
    {
        $addresses = $getAllAdresses->execute();

        return response()->json($addresses);
    }
}
