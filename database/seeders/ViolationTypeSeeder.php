<?php

namespace Database\Seeders;

use App\Models\ViolationTypesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViolationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $data = [
            [
                'name' => 'Tidak memakai Pas Bandara',
                'description' => NULL,
                'additional_form' => 0,
            ],
            [
                'name' => 'Mengendarai kendaraan tanpa TIM',
                'description' => NULL,
                'additional_form' => 0,
            ],
            [
                'name' => 'Mengendarai kendaraan dengan TIM Kadaluarsa',
                'description' => NULL,
                'additional_form' => 0,
            ],
            [
                'name' => 'Mengendarai kendaraan melebihi batas kecepatan',
                'description' => NULL,
                'additional_form' => 0,
            ],
            [
                'name' => 'Memarkir kendaraan tidak pada tempatnya',
                'description' => NULL,
                'additional_form' => 0,
            ],
            [
                'name' => 'Mengendarai kendaraan yang tidak dilengkapi dengan kelengkapan kendaraan yang wajib dimiliki, yaitu tanpa : ',
                'description' => NULL,
                'additional_form' => 1,
            ],
            [
                'name' => 'Lain-Lain ',
                'description' => NULL,
                'additional_form' => 1,
            ],
        ];

        foreach ($data as $type) {
            ViolationTypesModel::create($type);
        }
    }
}
