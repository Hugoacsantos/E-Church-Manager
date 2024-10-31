<?php

use App\Models\Family;
use App\Models\User;

test('Deve trazer varias familias', function () {
    $response = $this->get('/api/family/');

    $response->assertStatus(200);
});

test('Deve criar uma familia', function() {

    $data = [
        'name' => fake()->name()
    ];

    $response = $this->postJson('api/family/create', $data);


    $response->assertStatus(200);
});

test('Deve adicionar um membro a uma familia existente',function(){
    $data = [
        'name' => fake()->name()
    ];

    $user = User::factory()->create();

    $response = $this->postJson('api/family/create', $data);
    $family = $response->json();

    $data2 = [
        'familyId' => $family['id'],
        'userId' => $user->id
    ];

    $response1 = $this->postJson('api/family/addmemberfamily',$data2);

    $response1->assertStatus(200);
});

test('Deve pegar uma familia por id', function() {
    $family = Family::factory()->create();

    $response = $this->get('api/family/'.$family->id);


    $response->assertStatus(200);
});
