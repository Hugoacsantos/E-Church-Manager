<?php

namespace App\Http\Controllers\User;

use App\Actions\Users\GetAllUsers;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class GetUsersController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, GetAllUsers $getUsers) {
        $perPage = (int) $request->query('per_page');
        $page = (int) $request->query('page');
        $users = $getUsers->execute($perPage, $page);

        return response()->json($users);
    }
}
