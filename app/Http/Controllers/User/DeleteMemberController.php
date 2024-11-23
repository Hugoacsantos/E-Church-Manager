<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class DeleteMemberController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id, UserService $userService)
    {

        $userService->removeMember($id);
        return response()->json("Usuario removido");
    }
}
