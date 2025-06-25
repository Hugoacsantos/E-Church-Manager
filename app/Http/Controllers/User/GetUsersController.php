<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class GetUsersController extends Controller
{
    /**
     * Handle the incoming request.
     * Retorna todos os usuarios.
     */
    public function __invoke(Request $request, UserService $userServices)
    {
        $user = $userServices->getAll();

        return \response()->json($user);
    }
}
