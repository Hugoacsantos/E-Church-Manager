<?php

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
