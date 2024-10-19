<?php

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
