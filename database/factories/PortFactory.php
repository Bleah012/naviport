<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Port>
 */
class PortFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition()
{
    return [
        'name' => $this->faker->city . ' Port',
        'country' => $this->faker->country,
        'coordinates' => $this->faker->latitude . ', ' . $this->faker->longitude,
        'docking_capacity' => $this->faker->numberBetween(5, 50),
        'customs_authorized' => $this->faker->boolean,
        'is_active' => true,
    ];
}

}
