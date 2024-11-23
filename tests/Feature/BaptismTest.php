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
