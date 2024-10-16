<?php

test('Deve trazer varias familias', function () {
    $response = $this->get('/api/familia');

    $response->assertStatus(200);
});
