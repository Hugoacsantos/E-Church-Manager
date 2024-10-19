<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class FindUserByIdController extends Controller
{

    public function __construct(
        public UserService $userService
    ){

    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,string $id)
    {

        $user = $this->userService->findById($id);

        return \response()->json($user);
    }
}
