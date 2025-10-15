<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crew>
 */
class CrewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'first_name' => $this->faker->firstName,
        'last_name' => $this->faker->lastName,
        'role' => $this->faker->randomElement(['Captain', 'Engineer', 'Cook']),
        'phone_number' => $this->faker->unique()->phoneNumber,
        'nationality' => substr($this->faker->country, 0, 40),
        'is_active' => true,
    ];
}

}
