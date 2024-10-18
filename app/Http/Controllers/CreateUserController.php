<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\TypeUserService;
use App\Services\UserService;
use Illuminate\Http\Request;

class CreateUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateUserRequest $request)
    {
        $userServices = new UserService;
        $typeService = new TypeUserService;

        $user = $userServices->create($request->toDTO());
        $typeUser = $typeService->add($user->id);

        return \response()->json($user);
    }
}
