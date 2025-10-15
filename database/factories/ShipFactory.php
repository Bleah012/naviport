<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ship>
 */
class ShipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'name' => $this->faker->company,
        'registration_number' => strtoupper($this->faker->bothify('SHIP-####')),
        'capacity' => $this->faker->numberBetween(100, 10000),
        'type' => $this->faker->randomElement(['Cargo', 'Tanker', 'Container']),
        'status' => 'active',
        'is_active' => true,
    ];
}

}
