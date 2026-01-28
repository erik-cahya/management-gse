<?php

namespace Database\Seeders;

use App\Models\VehicleCheckupListModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleListCheckupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['list_name' => 'Cat Kendaraan'],
            ['list_name' => 'Kondisi Ban Kendaraan'],
            ['list_name' => 'Surat Izin Operasi Kendaraan'],
            ['list_name' => 'Kebersihan Interior & Eksterior'],
            ['list_name' => 'Pertolongan Pertama Pada Kecelakaan (P3K)'],
            ['list_name' => 'Pas Kendaraan'],
            ['list_name' => 'Flame Trap'],
            ['list_name' => 'Alat Pemadam Api Ringan (APAR)'],
            ['list_name' => 'Stiker "No Smoking"'],
            ['list_name' => 'Kebocoran Oli'],
            ['list_name' => 'Lampu Beacon Warna Kuning'],
            ['list_name' => 'Lampu Utama'],
            ['list_name' => 'Lampu Rem'],
            ['list_name' => 'Lampu Sign'],
            ['list_name' => 'Fungsi Hand Brake'],
            ['list_name' => 'Fungsi Rem Pedal'],
        ];

        foreach ($data as $dt) {
            VehicleCheckupListModel::create($dt);
        }
    }
}
