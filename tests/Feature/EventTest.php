<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Criar um evento', function () {
    $date = new DateTime();
    $timestamp = $date->getTimestamp();

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

// test('Listar todos os eventos', function() {

//     $response = $this->get('api/evento/');


//     $response->assertStatus(200);
//     expect($response->json())->toBeArray();
// });
