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

        User::factory()->create([
            'name' => 'Master Admin',
            'email' => 'master@gmail.com',
            'username' => 'master',
            'password' => bcrypt('master123'),
            'roles' => 'master'
        ]);

        $this->call(DataSeeder::class);
    }
}
