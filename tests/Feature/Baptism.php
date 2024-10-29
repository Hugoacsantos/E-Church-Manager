<?php

test('example', function () {
    $data = [
        'data_batismo' => (new DateTime())->format('Y-m-d H:i:s'),
        'membro_id' => 1,
        'batizado_por' => 1, 
    ];

    // dd($data);

    $response = $this->postJson('api/batismo/create',$data);

    $response->assertStatus(200);
})->only();
