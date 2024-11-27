<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Deve criar um novo aviso', function () {
    $user = User::factory()->create();
    $data = [
        'criado_por' => $user->id,
        'titulo' => 'Titulo 1',
        'aviso' => 'Escrevendo um texto de teste para a criacao do aviso',
        'status' => 'ativo',
        'criado_em' => now()->format('d-m-Y H:i:s'),
    ];



    $response = $this->postJson('/api/aviso/create',$data);

    $response->assertStatus(200);
});
