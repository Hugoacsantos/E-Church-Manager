<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use Illuminate\Http\Request;

class FindUserByIdController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,string $id)
    {
        
        $userServices = new UserServices;

        $user = $userServices->findById($id);

        return \response()->json($user);
    }
}
