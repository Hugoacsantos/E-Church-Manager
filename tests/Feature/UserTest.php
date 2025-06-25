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
    dump($response->getData());

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

})->only();

test('deve encontrar por id um usuario', function() {
    $data = [
        'name' => fake()->name(),
        'email' => fake()->email(),
        'password' => fake()->regexify('[A-Z]{5}[0-4]{3}')
    ];

    $response1 = $this->postJson('/api/user/create',$data);
    // $userId = $response1->json();
    $userId = $response1->getData();
    // dd($userId->id);
    // print_r($userId.PHP_EOL);
    $response = $this->get('/api/user/'.$userId->id);
    // dd($response->json());
    // print_r($response->getData().PHP_EOL);
    $response->assertStatus(200);
});

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
