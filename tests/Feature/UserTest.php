<?php

use Illuminate\Foundation\Testing\RefreshDatabaseState;

uses(RefreshDatabaseState::class);

test('Deve criar um usuario', function (){
    $data = [
        'name' => fake()->name(),
        'email' => fake()->email(),
        'password' => fake()->regexify('[A-Z]{5}[0-4]{3}')
    ];
    
    $response = $this->postJson('/api/user/create',$data);
    // dump($response);

    $response->assertStatus(200);
});

test('Deve Retornar varios usuarios', function(){
    $response = $this->get('api/user');
    // dd($response->getData());
    $response->assertStatus(200);
    // $data = json_decode($response->getContent(), true);
    // $this->assertNotEmpty($data);
});

test('deve encontrar por id um usuario', function() {
    $data = [
        'name' => fake()->name(),
        'email' => fake()->email(),
        'password' => fake()->regexify('[A-Z]{5}[0-4]{3}')
    ];

    $response1 = $this->post('/api/user/create',$data);
    // $userId = $response1->json();
    $userId = $response1->getData();
    // print_r($userId.PHP_EOL);
    $response = $this->get('/api/user/'.$userId);
    // print_r($response->getData().PHP_EOL);
    $response->assertStatus(200);
});