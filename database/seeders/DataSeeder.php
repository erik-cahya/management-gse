<?php

namespace Database\Seeders;

use App\Models\BahanBakarModel;
use App\Models\KategoriModel;
use App\Models\KepemilikanModel;
use App\Models\KodeGhModel;
use App\Models\KodeGseModel;
use App\Models\PeralatanModel;
use App\Models\PerusahaanModel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Master Admin',
            'email' => 'master@gmail.com',
            'username' => 'master',
            'password' => bcrypt('master123'),
            'roles' => 'master'
        ]);

        // ################################################ Perusahaan Seeder
        $perusahaan = [
            ['nama_perusahaan' => 'PT. AEROFOOD CATERING SERVICE'],
            ['nama_perusahaan' => 'PT. AFM AVIASI INDONESIA'],
            ['nama_perusahaan' => 'PT. ANGKASA PURA SUPPORTS'],
            ['nama_perusahaan' => 'PT. ASIA DIGITAL ENGINEERING INDONESIA'],
            ['nama_perusahaan' => 'PT. AVIA TECHNICS DIRGANTARA'],
            ['nama_perusahaan' => 'PT. CATHAY PACIFIC AIRLINES'],
            ['nama_perusahaan' => 'PT. CELEBI AVIATION INDONESIA'],
            ['nama_perusahaan' => 'PT. CITILINK INDONESIA'],
            ['nama_perusahaan' => 'PT. ENGGANG ANGKASA SARANA'],
            ['nama_perusahaan' => 'PT. GAPURA ANGKASA'],
            ['nama_perusahaan' => 'PT. GARDA TAWANG REKSA INDONESIA'],
            ['nama_perusahaan' => 'PT. GMF AERO ASIA'],
            ['nama_perusahaan' => 'PT. IAS CARGO & LOGISTICS'],
            ['nama_perusahaan' => 'PT. IAS FOOD SERVICES'],
            ['nama_perusahaan' => 'PT. JAS AERO ENGINEERING SERVICES'],
            ['nama_perusahaan' => 'PT. JASA ANGKASA SEMESTA'],
            ['nama_perusahaan' => 'PT. KARISMA BAHANA AVIASI'],
            ['nama_perusahaan' => 'PT. LION AIR'],
            ['nama_perusahaan' => 'PT. NATRA ABADINUGRAHA UTAMA PUTRA'],
            ['nama_perusahaan' => 'PT. PAREWA KATERING'],
            ['nama_perusahaan' => 'PT. PERTAMINA (PERSERO)'],
            ['nama_perusahaan' => 'PT. SARI RAHAYU BIOMANTARA'],
            ['nama_perusahaan' => 'PT. SRIWIJAYA AIR'],
            ['nama_perusahaan' => 'PT. TRANSNUSA AVIATION MANDIRI'],
        ];

        foreach ($perusahaan as $data) {
            PerusahaanModel::create($data);
        }

        // ################################################ Peralatan Seeder
        $peralatan = [
            ['nama_peralatan' => 'MOBIL/KENDARAAN OPERASIONAL'],
            ['nama_peralatan' => 'CATERING TRUCK (CTT)'],
            ['nama_peralatan' => 'AIRCRAFT TOWING TRACTOR (ATT)'],
            ['nama_peralatan' => 'LAVATORY SERVICE CART (LSC)'],
            ['nama_peralatan' => 'WATER SERVICE CART (WSC)'],
            ['nama_peralatan' => 'BAGGAGE CART (BCT)'],
            ['nama_peralatan' => 'MAINTENANCE STAIR'],
            ['nama_peralatan' => 'FIREX'],
            ['nama_peralatan' => 'TOWED PASSANGER STAIRS (TPS)'],
            ['nama_peralatan' => 'BAGGAGE TOWING TRACTOR (BTT)'],
            ['nama_peralatan' => 'AIRCRAFT TOWING BAR (ATB)'],
            ['nama_peralatan' => 'CREW TRANSPORTATION VEHICLE (CTV)'],
            ['nama_peralatan' => 'APRON PASSENGER BUS (APB)'],
            ['nama_peralatan' => 'COMPRESSOR WASHING'],
            ['nama_peralatan' => 'TANGGA TEKNIK'],
            ['nama_peralatan' => 'TOWBARLESS TRACTOR (TBT)'],
            ['nama_peralatan' => 'GROUND POWER UNIT/SYSTEM (GPU/GPS)'],
            ['nama_peralatan' => 'AIRSIDE OPERATION VEHICLE (AOV)'],
            ['nama_peralatan' => 'PASSENGER BOARDING STAIRS (PBS)'],
            ['nama_peralatan' => 'CONVEYOR BELT LOADER (CBL)'],
            ['nama_peralatan' => 'AIR CONDITIONING UNIT (ACU)'],
            ['nama_peralatan' => 'AIR STARTER UNIT/SYSTEM (ASU/ASS)'],
            ['nama_peralatan' => 'LAVATORY SERVICE TRUCK (LST)'],
            ['nama_peralatan' => 'WATER SERVICE TRUCK (WST)'],
            ['nama_peralatan' => 'PORTABLE GENSET (P-GNS)'],
            ['nama_peralatan' => 'PALLET DOLLIES (PDL)'],
            ['nama_peralatan' => 'CONTAINER DOLLIES (CDL)'],
            ['nama_peralatan' => 'HIGH LIFT LOADER (HLL)'],
            ['nama_peralatan' => 'FORKLIFT (FLT)'],
            ['nama_peralatan' => 'FUEL SERVICE TRUCK'],
            ['nama_peralatan' => 'MARSHALLING CAR'],
            ['nama_peralatan' => 'INCAPACITED PAX LOAD VEHICLE (IPL) / AMBULIFT'],
            ['nama_peralatan' => 'GENSET'],
            ['nama_peralatan' => 'PALLET RACK (PRK)'],
            ['nama_peralatan' => 'CONTAINER RACK (CRK)'],
            ['nama_peralatan' => 'BATTERY CART'],
            ['nama_peralatan' => 'MAINTENANCE UNIT TRUCK'],
            ['nama_peralatan' => 'NITROGEN CART'],
            ['nama_peralatan' => 'JACK CART'],
            ['nama_peralatan' => 'MAIN WHEEL CART'],
            ['nama_peralatan' => 'WASHING CART'],
            ['nama_peralatan' => 'HIGH LIFT CATERING TRUCK (HCT)'],
            ['nama_peralatan' => 'AXLE JACK'],
            ['nama_peralatan' => 'WHEEL CHANGER'],
            ['nama_peralatan' => 'FUEL BOWSER'],
            ['nama_peralatan' => 'WORKING STAIRS'],
            ['nama_peralatan' => 'BAGGAGE CARGO CART (BCC)'],
            ['nama_peralatan' => 'REFUELING DE-REFUELING TRUCK (RDT)'],
            ['nama_peralatan' => 'FUEL HYDRANT DISPENCER TRUCK (HDT)'],

        ];

        foreach ($peralatan as $data) {
            PeralatanModel::create($data);
        }

        $kategori = [
            ['nama_kategori' => 'MOTORIZED'],
            ['nama_kategori' => 'NON-MOTORIZED'],
        ];
        foreach ($kategori as $data) {
            KategoriModel::create($data);
        }

        $bahanBakar = [
            ['nama_bahan_bakar' => 'PERTALITE/PERTAMAX'],
            ['nama_bahan_bakar' => 'ELECTRIC VEHICLE'],
            ['nama_bahan_bakar' => 'SOLAR'],
            ['nama_bahan_bakar' => 'OTHERS'],
        ];
        foreach ($bahanBakar as $data) {
            BahanBakarModel::create($data);
        }

        $statusKepemilikan = [
            ['nama_kepemilikan' => 'Milik Perusahaan'],
            ['nama_kepemilikan' => 'Sewa/Sub Kontrak'],
        ];

        foreach ($statusKepemilikan as $data) {
            KepemilikanModel::create($data);
        }

        $kodeGh = [
            ['kode_gh' => 'ACS'],
            ['kode_gh' => 'AFM'],
            ['kode_gh' => 'APS'],
            ['kode_gh' => 'ADEI'],
            ['kode_gh' => 'FLT'],
            ['kode_gh' => 'CPA'],
            ['kode_gh' => 'CAI'],
            ['kode_gh' => 'CTV'],
            ['kode_gh' => 'EAS'],
            ['kode_gh' => 'GAPURA'],
            ['kode_gh' => 'GTRI'],
            ['kode_gh' => 'GMF'],
            ['kode_gh' => 'IASC'],
            ['kode_gh' => 'IASFS'],
            ['kode_gh' => 'JAES'],
            ['kode_gh' => 'JAS'],
            ['kode_gh' => 'KBA'],
            ['kode_gh' => 'LNI'],
            ['kode_gh' => 'NATRA'],
            ['kode_gh' => 'PAREWA'],
            ['kode_gh' => 'PERTAMINA'],
            ['kode_gh' => 'SRB'],
            ['kode_gh' => 'SJY'],
            ['kode_gh' => 'TNU'],
        ];

        foreach ($kodeGh as $data) {
            KodeGhModel::create($data);
        }

        $kodeGse = [
            ['kode_gse' => 'AOV'],
            ['kode_gse' => 'CTT'],
            ['kode_gse' => 'ATT'],
            ['kode_gse' => 'LSC'],
            ['kode_gse' => 'WSC'],
            ['kode_gse' => 'BCT'],
            ['kode_gse' => 'AMS'],
            ['kode_gse' => 'FIREX'],
            ['kode_gse' => 'TPS'],
            ['kode_gse' => 'BTT'],
            ['kode_gse' => 'ATB'],
            ['kode_gse' => 'CTV'],
            ['kode_gse' => 'APB'],
            ['kode_gse' => 'CDL'],
            ['kode_gse' => 'TBT'],
            ['kode_gse' => 'GPU'],
            ['kode_gse' => 'PBS'],
            ['kode_gse' => 'CBL'],
            ['kode_gse' => 'ACU'],
            ['kode_gse' => 'ASU'],
            ['kode_gse' => 'LST'],
            ['kode_gse' => 'P-GNS'],
            ['kode_gse' => 'PDL'],
            ['kode_gse' => 'HLL'],
            ['kode_gse' => 'FLT'],
            ['kode_gse' => 'HDT'],
            ['kode_gse' => 'MSC'],
            ['kode_gse' => 'IPL'],
            ['kode_gse' => 'GNS'],
            ['kode_gse' => 'PRK'],
            ['kode_gse' => 'CRK'],
            ['kode_gse' => 'OTHERS'],
            ['kode_gse' => 'HCT'],
            ['kode_gse' => 'BCC'],
            ['kode_gse' => 'RDT'],
        ];
        foreach ($kodeGse as $data) {
            KodeGseModel::create($data);
        }
    }
}
