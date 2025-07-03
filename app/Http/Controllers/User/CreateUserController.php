<?php

namespace App\Http\Controllers\User;

use App\Actions\Users\CreateUser;
use App\Actions\Users\TypesUsers\CreateTypeUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class CreateUserController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateUserRequest $request, CreateUser $createUser, CreateTypeUser $typeUser) {

        try {
            DB::beginTransaction();

            $user = $createUser->execute($request->toDTO());
            $typeUser->execute($user->id);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['error' => 'Falha ao criar usuario']);
        }

        return response()->json($user, status: 201);
    }
}
        