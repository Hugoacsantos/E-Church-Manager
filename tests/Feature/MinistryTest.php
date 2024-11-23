<?php

use App\Models\Ministry;
use App\Models\User;
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

test('Nao deve criar um novo ministerio com dados incorreto', function() {
    $data = [
        'descricao' => 'Alguma descricao legal',
        'status' => 'nullable'
    ];
    $response = $this->postJson('api/ministry/create',$data);

    $data1 = [
        'titulo' => 1,
        'descricao' => 'Alguma descricao legal',
        'status' => 'nullable'
    ];
    $response1 = $this->postJson('api/ministry/create',$data1);


    $response->assertStatus(422);
    $response1->assertStatus(422);
});

test('Deve adicionar um novo lider', function(){
    $user = User::factory()->create();
    $ministry = Ministry::factory()->create();

    $data = [
        'user_id' => $user->id,
        'ministry_id' => $ministry->id
    ];

    $response = $this->postJson('api/ministry/addleader',$data);

    $response->assertStatus(200);
});
