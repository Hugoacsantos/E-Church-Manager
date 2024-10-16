<?php

test('Deve criar um novo endereço', function () {

    
    $response = $this->get('/');

    $response->assertStatus(200);
});
