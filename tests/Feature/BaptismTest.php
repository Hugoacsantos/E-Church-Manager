<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;


uses( RefreshDatabase::class);


test('Deve criar um novo batismo', function () {
    $user = User::factory()->create();
    // $user1 = $user[0];
    // $user2 = $user[1];
    $user2 = User::factory()->create();
    $data = [
        'data_batismo' => (new DateTime())->format('Y-m-d H:i:s'),
        'membro_id' => $user->id,
        'batizado_por' => $user2->id,
    ];

    $response = $this->postJson('api/baptism/create',$data);
    $response->assertStatus(200);
});

test('Nao deve criar mais de um batismo para o usuario', function () {
    $user = User::factory()->create();
    // $user1 = $user[0];
    // $user2 = $user[1];
    $user2 = User::factory()->create();
    $data = [
        'data_batismo' => (new DateTime())->format('Y-m-d H:i:s'),
        'membro_id' => $user->id,
        'batizado_por' => $user2->id,
    ];

    $response = $this->postJson('api/baptism/create',$data);

    $data2 =  [
        'data_batismo' => (new DateTime())->format('Y-m-d H:i:s'),
        'membro_id' => $user->id,
        'batizado_por' => $user2->id,
    ];

    $response1 = $this->postJson('api/baptism/create',$data2);


    $response->assertStatus(200);
    $response1->assertStatus(500);

});

test('Deve retornar um batismo por ID', function () {
    $user = User::factory()->create();
    $user2 = User::factory()->create();
    $data = [
        'data_batismo' => (new DateTime())->format('Y-m-d H:i:s'),
        'membro_id' => $user->id,
        'batizado_por' => $user2->id,
    ];
    $response = $this->postJson('api/baptism/create',$data);

    $data2 = $response->getData();

    $response1 = $this->getJson('api/baptism/'.$data2->id);

    $response1->assertStatus(200);
});

test('Deve retornar um batismo buscando por ID do usuario', function () {
    $user = User::factory()->create();
    $user2 = User::factory()->create();
    $data = [
        'data_batismo' => (new DateTime())->format('Y-m-d H:i:s'),
        'membro_id' => $user->id,
        'batizado_por' => $user2->id,
    ];
    $response = $this->postJson('api/baptism/create',$data);

    $data2 = $response->getData();

    $response1 = $this->getJson('api/baptism/member/'.$data2->membro_id);

    $response1->assertStatus(200);
});

test('Deve retornar um ou mais batismo buscando por ID de quem batizou', function () {
    $user = User::factory()->create();
    $user2 = User::factory()->create();
    $data = [
        'data_batismo' => (new DateTime())->format('Y-m-d H:i:s'),
        'membro_id' => $user->id,
        'batizado_por' => $user2->id,
    ];
    $response = $this->postJson('api/baptism/create',$data);

    $data2 = $response->getData();

    $response1 = $this->getJson('api/baptism/baptizer/'.$data2->membro_id);

    $response1->assertStatus(200);
});
