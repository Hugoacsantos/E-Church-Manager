<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Services\AddressService;
use Illuminate\Http\Request;

class GetAddressesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddressService $addressService)
    {
        $addresses = $addressService->getAll();

        return response()->json($addresses);
    }
}
