<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class FindUserByIdController extends Controller
{

    /**
     * Handle the incoming request.
     * Encontra usuario por id.
     */
    public function __invoke(string $id, UserService $userService)
    {

        $user = $userService->findById($id);

        return \response()->json($user);
    }
}
