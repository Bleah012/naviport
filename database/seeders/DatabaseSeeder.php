<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    \App\Models\Client::factory(10)->create();
    \App\Models\Ship::factory(5)->create();
    \App\Models\Crew::factory(15)->create();
    \App\Models\Port::factory(6)->create();
    \App\Models\Cargo::factory(20)->create();
    \App\Models\Shipment::factory(10)->create();
}

}
