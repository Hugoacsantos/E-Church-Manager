<?php

use Illuminate\Support\Facades\Exceptions;
use PHPUnit\Runner\InvalidOrderException;

test('Deve criar um novo endereço', function () {

    $data = [
        'name' => fake()->name(),
        'email' => fake()->email(),
        'password' => fake()->regexify('[A-Z]{5}[0-4]{3}')
    ];

    $response1 = $this->postJson('/api/user/create',$data);
    $user = $response1->getData();

    $data = [
        'user_id' => $user->id, // Um ID de usuário válido
        'rua' => 'Rua Teste',
        'numero' => '123',
        'complemento' => 'Apto 456',
        'bairro' => 'Centro'
    ];

    $response = $this->postJson('/api/address/create',$data);

    $response->assertStatus(200);
});

test('Não deve criar um endereco', function () {

    // $data = [
    //     'name' => fake()->name(),
    //     'email' => fake()->email(),
    //     'password' => fake()->regexify('[A-Z]{5}[0-4]{3}')
    // ];

    // $response1 = $this->postJson('/api/user/create',$data);
    // $user = $response1->getData();

    $data = [
        'user_id' => "", // Um ID de usuário válido
        'rua' => 'Rua Teste',
        'numero' => '123',
        'complemento' => 'Apto 456',
        'bairro' => ''
    ];

    $response = $this->postJson('/api/address/create',$data);

    $response->assertStatus(422);
});

test('Deve encontar um endereço', function () {

    $data = [
        'name' => fake()->name(),
        'email' => fake()->email(),
        'password' => fake()->regexify('[A-Z]{5}[0-4]{3}')
    ];

    $response1 = $this->postJson('/api/user/create',$data);
    $user = $response1->getData();

    $data = [
        'user_id' => $user->id, // Um ID de usuário válido
        'rua' => 'Rua Teste',
        'numero' => '123',
        'complemento' => 'Apto 456',
        'bairro' => 'Centro'
    ];

    $response = $this->postJson('/api/address/create',$data);
    $idAddress = $response->json()['id'];

    $response1 = $this->get('/api/address/'.$idAddress);

    $response1->assertStatus(200);
});

test('Nao deve criar mais que o numero maximo de endereço', function() {


    $data = [
        'name' => fake()->name(),
        'email' => fake()->email(),
        'password' => fake()->regexify('[A-Z]{5}[0-4]{3}')
    ];

    $response1 = $this->postJson('/api/user/create',$data);
    $user = $response1->getData();

    $data = [
        'user_id' => $user->id,
        'rua' => 'Rua Teste',
        'numero' => '123',
        'complemento' => 'Apto 456',
        'bairro' => 'Centro'
    ];

    $response = $this->postJson('/api/address/create',$data);
    $response1 = $this->postJson('/api/address/create',$data);
    $response2 = $this->postJson('/api/address/create',$data);
    $response3 = $this->postJson('/api/address/create',$data);

    // $response->assertStatus(200);
    // $response1->assertStatus(200);
    // $response2->assertStatus(200);
    // $response3->assertStatus(500);
    $response3->assertInternalServerError();

    $response3->assertJson([
        'message' => 'Usuario ja possui o total permitido de endereco cadastrado'
    ]);

});
