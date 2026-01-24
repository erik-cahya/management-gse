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
                'code' => 'SANC-01',
                'name' => 'Peringatan/Teguran Lisan',
                'description' => NULL
            ],
            [
                'code' => 'SANC-02',
                'name' => 'Peringatan/Teguran Tertulis',
                'description' => NULL
            ],
            [
                'code' => 'SANC-03',
                'name' => 'Pencabutan Pas Sementara',
                'description' => NULL
            ],
            [
                'code' => 'SANC-04',
                'name' => 'Pencabutan TIM Sementara',
                'description' => NULL
            ],
        ];

        foreach ($data as $type) {
            SanctionModel::create($type);
        }
    }
}
