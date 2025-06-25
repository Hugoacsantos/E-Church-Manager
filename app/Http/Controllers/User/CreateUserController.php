<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Services\TypeUserService;
use App\Services\UserService;


class CreateUserController extends Controller
{

    /**
     * Handle the incoming request.
     * Cria um novo usuario 
     */
    public function __invoke(CreateUserRequest $request, UserService $userService, TypeUserService $typeUserService) {
        $user = $userService->create($request->toDTO());
        $typeUserService->add($user->id);

        return \response()->json($user);
    }
}
