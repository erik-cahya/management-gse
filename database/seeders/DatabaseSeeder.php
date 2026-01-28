<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(DataSeeder::class);
        $this->call(ViolationTypeSeeder::class);
        $this->call(SanctionSeeder::class);
        $this->call(VehicleListCheckupSeeder::class);
    }
}
