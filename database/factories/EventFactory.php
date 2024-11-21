<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'descricao' => $this->faker->paragraph,
            'local' => $this->faker->address,
            'data_encerramento' => $this->faker->dateTimeBetween('now', '+30 minutes')->format('Y-m-d'),
            'status' => $this->faker->randomElement(['ativo', 'cancelado', 'pendente']),
        ];
    }
}
