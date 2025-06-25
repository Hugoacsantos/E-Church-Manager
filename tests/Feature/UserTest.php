<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;


uses( RefreshDatabase::class);

test('Deve criar um usuario', function (){
    $data = [
        'name' => fake()->name(),
        'email' => fake()->email(),
        'password' => fake()->regexify('[A-Z]{5}[0-4]{3}')
    ];

    $response = $this->postJson('/api/users/create',$data);

    
    expect($response->json()['id'])->toEqual(1);
    expect($response->json())->toHaveKeys(['name','email','id']);

    $response->assertStatus(200);

});

test('Deve Retornar uma lista de varios usuarios', function(){

    $data = [
        'name' => fake()->name(),
        'email' => fake()->email(),
        'password' => fake()->regexify('[A-Z]{5}[0-4]{3}')
    ];

    $response1 = $this->postJson('/api/users/create',$data);




    $response = $this->get('api/users');
    // dd($response->getData());


    $response->assertStatus(200);
    // dd(count($response->json()));
    expect($response->json())->not()->toBeEmpty();

});

test('deve encontrar por id um usuario', function() {
    $data = [
        'name' => fake()->name(),
        'email' => fake()->email(),
        'password' => fake()->regexify('[A-Z]{5}[0-4]{3}')
    ];
    

    $response1 = $this->postJson('/api/users/create',$data);
    $user = $response1->json();
    $response = $this->get('/api/users/'.$user['id']);
    $userData = $response->json();
    dump($userData);
    expect($userData)->not()->toBeEmpty();
    expect($userData)->toBeArray();
    expect($userData)->toHaveCount(7);
    expect($userData)->toHaveKey('id');
    $response->assertStatus(200);

})->only();

test('Deve remover um usuario', function() {

    $data = [
        'name' => fake()->name(),
        'email' => fake()->email(),
        'password' => fake()->regexify('[A-Z]{5}[0-4]{3}')
    ];

    $response1 = $this->postJson('/api/user/create',$data);
    $user = $response1->json();

    $response = $this->deleteJson('api/user/removemember/'.$user['id']);

    $response->assertStatus(200);
});
