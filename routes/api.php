<?php

use App\Http\Controllers\AddMemberInFamiliaController;
use App\Http\Controllers\AddMembroEventController;
use App\Http\Controllers\CreateEndereco;
use App\Http\Controllers\CreateEventoController;
use App\Http\Controllers\CreateFamiliaNameController;
use App\Http\Controllers\CreateNewBatismoController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\FindEnderecoByIdController;
use App\Http\Controllers\FindUserByIdController;
use App\Http\Controllers\GetByIdEventController;
use App\Http\Controllers\GetFamiliaByIdController;
use App\Http\Controllers\GetUsersController;
use App\Http\Controllers\ListAllEvents;
use App\Http\Controllers\ListEventsCloseController;
use App\Http\Controllers\ListEventsOpenController;
use App\Http\Controllers\RemoveMembroEventoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('user')->group(function (){
    Route::get('/',GetUsersController::class);
    Route::post('/create',CreateUserController::class);
    Route::get('/{id}',FindUserByIdController::class);
});

// Falta testa esses endpoints
Route::prefix('endereco')->group(function () {
    Route::get('/{id}',FindEnderecoByIdController::class);
    Route::post('/create',CreateEndereco::class);
});

// falta testar esses endpoints
Route::prefix('familia')->group(function () {
    Route::post('/create',  CreateFamiliaNameController::class);
    Route::get('/{id}', GetFamiliaByIdController::class);
    Route::post('/adicionarmembro',AddMemberInFamiliaController::class);
});


// Falta testa esses endpoints
Route::prefix('batismo')->group(function() {
    Route::post('/create',CreateNewBatismoController::class);
});

//Falta testar os endpoints
Route::prefix('evento')->group(function() {
    Route::get('/listAll',ListAllEvents::class);
    Route::get("/findById/{id}",GetByIdEventController::class);
    Route::get('/listOpen',ListEventsOpenController::class);
    Route::get('/listClose',ListEventsCloseController::class);
    Route::post('/create',CreateEventoController::class);
    Route::post('/addmembroevento',AddMembroEventController::class);
    Route::post('/removemembro',RemoveMembroEventoController::class);
});