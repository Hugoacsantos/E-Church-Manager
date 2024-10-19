<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Services\AddressService;
use App\Services\EnderecoServices;
use Illuminate\Http\Request;

class FindEnderecoByIdController extends Controller
{
    public function __construct(
        public AddressService $addressService
    ) {

    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,string $user_id) {
        $endereco = $this->addressService->findById($user_id);

        return \response()->json($endereco);
    }
}
