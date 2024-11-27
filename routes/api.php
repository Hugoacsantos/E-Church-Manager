<?php

use App\Http\Controllers\Address\CreateAddressController;
use App\Http\Controllers\Address\FindAddressController;
use App\Http\Controllers\Address\FindByUserController;
use App\Http\Controllers\Address\GetAddressesController;
use App\Http\Controllers\Announcements\CreateController;
use App\Http\Controllers\Baptism\CreateNewBatismoController;
use App\Http\Controllers\Baptism\GetBaptismByBaptizerIdController;
use App\Http\Controllers\Baptism\GetBaptismByIdController;
use App\Http\Controllers\Baptism\GetBaptismByUserIdController;
use App\Http\Controllers\Event\AddMembroEventController;
use App\Http\Controllers\Event\CreateEventoController;
use App\Http\Controllers\Event\GetByIdEventController;
use App\Http\Controllers\Event\ListAllEvents;
use App\Http\Controllers\Event\ListEventsCloseController;
use App\Http\Controllers\Event\ListEventsOpenController;
use App\Http\Controllers\Event\RemoveMembroEventoController;

use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\DeleteMemberController;
use App\Http\Controllers\User\FindUserByIdController;
use App\Http\Controllers\User\GetUsersController;

use App\Http\Controllers\Family\AddMemberInFamiliaController;
use App\Http\Controllers\Family\GetFamiliaByIdController;
use App\Http\Controllers\Family\CreateFamilyController;
use App\Http\Controllers\Family\GetFamiliesController;
use App\Http\Controllers\Family\RemoveMemberController;

use App\Http\Controllers\Ministry\AddLeaderController;
use App\Http\Controllers\Ministry\CreateMinistryController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('user')->group(function (){
    Route::get('/',GetUsersController::class);
    Route::post('/create',CreateUserController::class);
    Route::get('/{id}',FindUserByIdController::class);
    Route::delete('/removemember/{id}', DeleteMemberController::class);
});

Route::prefix('address')->group(function () {
    Route::get('/',GetAddressesController::class);
    Route::get('/{id}',FindAddressController::class);
    Route::post('/create',CreateAddressController::class);
    Route::get('/findbyuser/{id}', FindByUserController::class);
});


Route::prefix('family')->group(function () {
    Route::post('/create', CreateFamilyController::class);
    Route::get('/',GetFamiliesController::class);
    Route::get('/{id}', GetFamiliaByIdController::class);
    Route::post('/addmemberfamily',AddMemberInFamiliaController::class);
    Route::post('/removememberfamily', RemoveMemberController::class);
});


Route::prefix('baptism')->group(function() {
    Route::get('/{id}', GetBaptismByIdController::class);
    Route::post('/create',CreateNewBatismoController::class);
    Route::get('/member/{id}', GetBaptismByUserIdController::class);
    Route::get('/baptizer/{id}', GetBaptismByBaptizerIdController::class);
});

//Falta testar os endpoints
Route::prefix('event')->group(function() {
    Route::get('/',ListAllEvents::class);
    Route::get("/findById/{id}",GetByIdEventController::class);
    Route::get('/listOpen',ListEventsOpenController::class);
    Route::get('/listClose',ListEventsCloseController::class);
    Route::post('/create',CreateEventoController::class);
    Route::post('/addmembroevento',AddMembroEventController::class);
    Route::post('/removemembro',RemoveMembroEventoController::class);
});

Route::prefix('ministry')->group(function() {
    Route::post('/create', CreateMinistryController::class);
    Route::post('addleader', AddLeaderController::class);
});

Route::prefix('aviso')->group(function() {
    Route::post('/create', CreateController::class);
});
