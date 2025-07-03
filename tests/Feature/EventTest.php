<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;

uses(RefreshDatabase::class);

test('Criar um evento com data valida', function () {

    $data = [
        'titulo' => 'Evento 1',
        'descricao' => 'Descricao evento 1',
        'local' => 'Local ficticio evento 1',
        'data' => now()->addMinutes(10)->format('Y-m-d H:i:s')
    ];

    $response = $this->postJson('/api/events',$data);
    
    expect($response)->not->toBe(null);

    $response->assertStatus(200);
});


test('Nao deve criar um novo evento com datas invalidas', function(){
    $yesterday = Carbon::yesterday();

    $datePast = [
        'titulo' => 'Evento 2',
        'descricao' => 'Descricao evento 2',
        'local' => 'Local ficticio evento 2',
        'data' => $yesterday->format('Y-m-d H:i:s')
    ];

    $response = $this->postJson('/api/events',$datePast);
    // $response->dd();
    $response->assertStatus(422);

});


test('Listar todos os eventos', function() {

    $response = $this->getJson('api/events');
    expect($response->json())->toBeArray();

    $response->assertStatus(200);
});

test('Listar todos os eventos abertos', function() {

    $response = $this->getJson('api/events/status/open');


    $response->assertStatus(200);
    expect($response->json())->toBeArray();
});

test('Listar todos os eventos fechados', function() {

    $response = $this->getJson('api/events/status/close');


    $response->assertStatus(200);
    expect($response->json())->toBeArray();
});

test('Deve adicionar usuario no evento', function() {

    $event = Event::factory()->create();
    $user = User::factory()->create();


    $data = [
        'user_id' => $user->id,
    ];

    $response = $this->postJson("api/events/{$event['id']}/members",$data);

    $response->assertStatus(200);
});

test('Deve remover usuario no evento', function() {

    $event = Event::factory()->create();
    $user = User::factory()->create();


    $data = [
        'user_id' => $user->id,
    ];

    $response = $this->postJson("api/events/{$event['id']}/members",$data);
    $data2 = $response->getContent();
    $response1 = $this->deleteJson("api/events/{$event['id']}/members",$data);


    $response1->assertStatus(200);
});



test('Deve encontrar um evento por ID', function() {

    $event = Event::factory()->create();

    $response = $this->getJson('api/events/'.$event->id);

    $response->assertStatus(200);
});

test('Não deve encontrar um evento por ID', function() {

    $event_id = '';

    $response = $this->getJson('api/events/'.$event_id);
    // dd($response->json());
    expect($response->json())->toBeEmpty();
    $response->assertStatus(200);
});
