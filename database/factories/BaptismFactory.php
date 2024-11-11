<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Baptism>
 */
class BaptismFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'data_batismo' => $this->faker->dateTime(),
            'membro_id' => User::factory(),
            'batizado_por' => User::factory(),
            'url' => $this->faker->url(),
        ];
    }
}
