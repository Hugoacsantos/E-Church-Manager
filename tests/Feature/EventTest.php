<?php

use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Criar um evento com data valida', function () {

    $data = [
        'titulo' => 'Evento 1',
        'descricao' => 'Descricao evento 1',
        'local' => 'Local ficticio evento 1',
        'data' => now()->format('Y-m-d H:i:s')
    ];

    $response = $this->postJson('/api/event/create',$data);


    $response->assertStatus(200);
    expect($response)->not->toBe(null);
});


test('Nao deve criar um novo evento com datas invalidas', function(){
    $yesterday = Carbon::yesterday();

    $datePast = [
        'titulo' => 'Evento 2',
        'descricao' => 'Descricao evento 2',
        'local' => 'Local ficticio evento 2',
        'data' => $yesterday->format('Y-m-d H:i:s')
    ];

    $response = $this->postJson('/api/event/create',$datePast);
    // $response->dd();
    $response->assertStatus(422);

})->only();


test('Listar todos os eventos', function() {

    $response = $this->getJson('api/event/');


    $response->assertStatus(200);
    expect($response->json())->toBeArray();
});

test('Listar todos os eventos abertos', function() {

    $response = $this->getJson('api/event/listOpen');


    $response->assertStatus(200);
    expect($response->json())->toBeArray();
});

test('Listar todos os eventos fechados', function() {

    $response = $this->getJson('api/event/listClose');


    $response->assertStatus(200);
    expect($response->json())->toBeArray();
});

test('Deve adicionar usuario no evento', function() {

    $event = Event::factory()->create();
    $user = User::factory()->create();


    $data = [
        'user_id' => $user->id,
        'event_id' => $event->id
    ];

    $response = $this->postJson('api/event/addmembroevento',$data);

    $response->assertStatus(200);
});
