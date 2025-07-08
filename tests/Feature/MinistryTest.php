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
    $response = $this->postJson('api/ministries',$data);

    $response->assertStatus(200);
});

test('Nao deve criar um novo ministerio com dados incorreto', function() {
    $data = [
        'descricao' => 'Alguma descricao legal',
        'status' => 'nullable'
    ];
    $response = $this->postJson('api/ministries',$data);

    $data1 = [
        'titulo' => 1,
        'descricao' => 'Alguma descricao legal',
        'status' => 'nullable'
    ];
    $response1 = $this->postJson('api/ministries',$data1);


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

    $response = $this->postJson("api/ministries/{$data['ministry_id']}/members",$data);

    $response->assertStatus(200);
});


test('Deve adicionar um novo membro ao ministerio', function() {
    $user = User::factory()->create();

    $data_ministry = [
        'titulo' => 'Titulo qualquer',
        'descricao' => 'Alguma descricao legal',
        'status' => 'nullable'
    ];
    $response = $this->postJson('api/ministries',$data_ministry);

    $ministry = $response->json();


    $response1 = $this->postJson("api/ministries/{$ministry['id']}/members",['user_id' => $user->id]);
    dump($response1->json()['message']);
    $response1->assertStatus(201);
    expect($response1->json()['message'])->toEqual('usuario adicionado');
});

test('Deve remover um novo membro do ministerio', function() {
    $user = User::factory()->create();

    $data_ministry = [
        'titulo' => 'Titulo qualquer',
        'descricao' => 'Alguma descricao legal',
        'status' => 'nullable'
    ];
    $response = $this->postJson('api/ministries',$data_ministry);

    $ministry = $response->json();

    $response1 = $this->postJson("api/ministries/{$ministry['id']}/members",['user_id' => $user->id]);
    
    $response2 = $this->deleteJson("api/ministries/{$ministry['id']}/members",['user_id' => $user->id]);
    dump($response2->json()['message']);
    $response2->assertStatus(200);
    expect($response2->json()['message'])->toEqual('usuario removido');
});