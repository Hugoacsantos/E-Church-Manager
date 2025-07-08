<?php

namespace App\Http\Controllers\Ministry;

use App\Actions\Ministry\AddMemberMinistry;
use App\Http\Controllers\Controller;
use App\Models\Ministry;
use App\Models\User;
use Illuminate\Http\Request;

class AddMemberMinistryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $ministryId, AddMemberMinistry $addMemberMinistry)
    {
        $data = $request->validate([
                                    'user_id' => 'required|integer|max:50|unique:users',
        ]);
        $user = User::find($data['user_id']);

        if(!$ministryId) {
            return response()->json([
                'error' => 'Ministerio nao foi passado'
            ]);
        }

        $ministry = Ministry::find($ministryId);


        $addMemberMinistry->execute($user,$ministry);


        return response()->json(['message' => 'usuario adicionado'],status: 201);
    }
}
