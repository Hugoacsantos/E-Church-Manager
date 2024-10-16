<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\UserServices;
use Illuminate\Http\Request;

class CreateUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateUserRequest $request)
    {
        $userServices = new UserServices();

        $data = $request->toDTO();

        $user = $userServices->create($data);
        

        return \response()->json($user);
    }
}
