<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AddressService;
use Illuminate\Http\Request;

class FindByUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id, AddressService $addressService)
    {
        $user = User::find($id);

        $address = $addressService->findByUserId($user);

        return response()->json($address);
    }
}
