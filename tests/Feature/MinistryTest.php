<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


test('Deve criar um novo ministerio', function () {
    $data = [
        'titulo' => 'Titulo qualquer',
        'descricao' => 'Alguma descricao legal',
        'status' => 'nullable'
    ];
    $response = $this->postJson('api/ministry/create',$data);

    $response->assertStatus(200);
});
