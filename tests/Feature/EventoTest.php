<?php

test('Criar um evento', function () {
    $data = ['titulo' => 'Evento 1',
        'descricao' => 'Descricao evento 1',
        'local' => 'Local ficticio evento 1',
        'status' => 'Aberto'];
    $response = $this->post('/api/evento/create',$data);

    $response->assertStatus(200);
    expect($response)->not->toBe(null);
});

test('Listar todos os eventos', function() {

    $response = $this->get('api/evento/');


    $response->assertStatus(200);
    expect($response->json())->toBeArray();
});