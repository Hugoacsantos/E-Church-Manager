<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMembroFamilia;
use App\Services\FamiliaServices;
use Illuminate\Http\Request;

class AddMemberInFamiliaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddMembroFamilia $request)
    {
        $service = new FamiliaServices;

        $membro = $service->addMember($request->toDTO());


    }
}
