<?php

namespace Database\Seeders;

use App\Models\SanctionModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SanctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Peringatan/Teguran Lisan',
                'description' => NULL,
                'additional_form' => 0
            ],
            [
                'name' => 'Peringatan/Teguran Tertulis',
                'description' => NULL,
                'additional_form' => 0
            ],
            [
                'name' => 'Pencabutan Pas Sementara',
                'description' => NULL,
                'additional_form' => 0
            ],
            [
                'name' => 'Pencabutan TIM Sementara',
                'description' => NULL,
                'additional_form' => 0
            ],

            [
                'name' => 'Lain Lain',
                'description' => NULL,
                'additional_form' => 1
            ],
        ];

        foreach ($data as $type) {
            SanctionModel::create($type);
        }
    }
}
