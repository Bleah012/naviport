<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipment>
 */
class ShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'cargo_id' => \App\Models\Cargo::factory(),
        'ship_id' => \App\Models\Ship::factory(),
        'origin_port_id' => \App\Models\Port::factory(),
        'destination_port_id' => \App\Models\Port::factory(),
        'departure_date' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
        'arrival_date' => $this->faker->dateTimeBetween('+2 days', '+2 weeks'),
        'status' => $this->faker->randomElement(['scheduled', 'in transit', 'delayed']),
        'delay_reason' => $this->faker->optional()->sentence,
    ];
}

}
