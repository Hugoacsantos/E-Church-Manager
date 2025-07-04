<?php

namespace App\Http\Controllers\Address;

use App\Actions\Address\CreateAddress;
use App\Actions\Users\FindUserById;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAddressRequest;


class CreateAddressController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateAddressRequest $request, CreateAddress $createAddress, FindUserById $findUserById)
    {
        $user = $findUserById->execute($request->toDTO()->userId);

        $endereco = $createAddress->execute($request->toDTO(), $user);

        return response()->json(data: $endereco, status: 201);
    }
}
