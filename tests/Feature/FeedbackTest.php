<?php

test('Deve criar um novo feedback', function () {

    $data = [
        'user' => '1',
        'titulo' => 'Testando o titulo',
        'texto' => 'Testando qualquer tipo de texto escrito aqui',
        'data' => now()->format('d-m-Y H:i:s'),
        'tipo_de_feedback' => 'Evento 1'
    ];


    $response = $this->postJson('/api/feedback/create', $data);

    $response->assertStatus(200);
});
