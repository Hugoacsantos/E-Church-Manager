<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Services\TypeUserService;
use App\Services\UserService;


class CreateUserController extends Controller
{

    public function __construct(
        public UserService $userService,
        public TypeUserService $typeUserService
    ){}

    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateUserRequest $request) {
        $user = $this->userService->create($request->toDTO());
        $this->typeUserService->add($user->id);

        return \response()->json($user);
    }
}
