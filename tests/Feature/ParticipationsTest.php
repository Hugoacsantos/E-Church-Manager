<?php

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;


uses( RefreshDatabase::class);

test('Deve retonar uma lista com o historico de presencao do usuario', function() {

    $event = Event::factory()->create();
    $user = User::factory()->create();


    $data = [
        'user_id' => $user->id,
    ];

    $response = $this->postJson("api/events/{$event['id']}/members",$data);

    $response1 = $this->getJson('api/participations/users/'.$data['user_id']);

    $response1->assertStatus(200);
});