<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use Illuminate\Http\Request;

class GetUsersController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $userServices = new UserServices;
        $user = $userServices->getAll();

        return \response()->json($user);
    }
}
