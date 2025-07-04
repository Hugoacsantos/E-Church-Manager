<?php

namespace App\Http\Controllers\Address;

use App\Actions\Address\FindAllAddressUserId;
use App\Actions\Users\FindUserById;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AddressService;
use Illuminate\Http\Request;

class FindByUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id, FindAllAddressUserId $findAllAddressUserId, FindUserById $findUserById)
    {
        $user = $findUserById->execute($id);

        $address = $findAllAddressUserId->execute($user);

        return response()->json($address);
    }
}
