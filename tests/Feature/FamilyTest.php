<?php

use App\Models\Family;
use App\Models\FamilyUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Deve trazer varias familias', function () {
    $data = [
        'name' => fake()->name()
    ];

    $responseFamilyCreated = $this->postJson('api/families/', $data);

    $response = $this->getJson('/api/families/');
    $families = $response->json();

    // expect(count($families));
    expect($families)->toBeArray()->toBeGreaterThanOrEqual(1);
    // expect($families[0])->toHaveKeys(['id','nomefamilia','status']);
    expect($families)->each()->toHaveCount(5)->toHaveKeys(['id','nomefamilia','status',]);
    // expect($families)->each()->toHaveKeys(['id','nomefamilia','status']);
    // expect($families)->sequence(fn ($family) => ->not()->toBeEmpty());


    $response->assertStatus(200);
});

test('Deve criar uma familia', function() {

    $data = [
        'name' => fake()->name()
    ];

    $response = $this->postJson('api/families/', $data);
    $familiesResponse = $response->json();


    expect($familiesResponse)->not()->toBeEmpty();
    expect($familiesResponse)->toHaveCount(5);
    expect($familiesResponse)->toMatchArray([
        'nomefamilia' => $data['name'],
        'status' => 'Ativo',
    ]);
    expect($familiesResponse['id'])->not()->ToBeEmpty();

    $response->assertStatus(200);
});

test('Deve adicionar um membro a uma familia existente',function(){
    $data = [
        'name' => fake()->name()
    ];

    $user = User::factory()->create();

    $response = $this->postJson('api/families', $data);
    $family = $response->json();

    $data2 = [
        'userId' => $user->id
    ];

    $response1 = $this->postJson("api/families/{$family['id']}/members",$data2);

    $response1->assertStatus(200);
});

test('Deve remover um usuario da familia', function() {

    $familyUser = FamilyUser::factory()->create();

    $data2 = [
        'userId' => $familyUser['user_id']
    ];

    $response1 = $this->deleteJson("api/families/{$familyUser['id']}/members",$data2);


    $response1->assertStatus(200);
});


test('Deve pegar uma familia por id', function() {
    $data = Family::factory()->create();

    $response = $this->getJson('api/families/'.$data->id);
    $family = $response->json();

    expect($family)->not()->toBeEmpty();
    expect($family)->toHaveCount(5)->toHaveKeys(['id','nomefamilia','status',]);

    $response->assertStatus(200);
});


