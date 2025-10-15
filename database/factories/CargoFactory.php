<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cargo>
 */
class CargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'description' => $this->faker->sentence,
        'weight' => $this->faker->randomFloat(2, 100, 10000),
        'volume' => $this->faker->randomFloat(2, 10, 500),
        'cargo_type' => $this->faker->randomElement(['Liquid', 'Container', 'Bulk']),
        'client_id' => \App\Models\Client::factory(),
        'is_active' => true,
    ];
}

}
