<?php

use App\Models\User;

test('Deve criar um novo batismo', function () {
    $user = User::factory()->create();
    $user2 = User::factory()->create();
    $data = [
        'data_batismo' => (new DateTime())->format('Y-m-d H:i:s'),
        'membro_id' => $user->id,
        'batizado_por' => $user2->id,
    ];

    $response = $this->postJson('api/baptism/create',$data);
    $response->assertStatus(200);
});
