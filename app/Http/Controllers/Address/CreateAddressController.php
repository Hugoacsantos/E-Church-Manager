<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAddressRequest;
use App\Services\AddressService;
use App\Services\UserService;
use Illuminate\Http\Request;

class CreateAddressController extends Controller
{
    public function __construct(
        public AddressService $addressService,
        public UserService $userService
    ) {
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateAddressRequest $request)
    {
        $user = $this->userService->findById($request->toDTO()->userId);

        $endereco = $this->addressService->create($request->toDTO(), $user);

        return response()->json($endereco);
    }
}
