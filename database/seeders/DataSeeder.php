<?php

namespace Database\Seeders;

use App\Models\BahanBakarModel;
use App\Models\CategoryGseModel;
use App\Models\CodeGhModel;
use App\Models\CodeGseModel;
use App\Models\CompanyGseModel;
use App\Models\FuelTypeModel;
use App\Models\KategoriModel;
use App\Models\KepemilikanModel;
use App\Models\KodeGhModel;
use App\Models\KodeGseModel;
use App\Models\OwnershipTypeGseModel;
use App\Models\PeralatanModel;
use App\Models\PerusahaanModel;
use App\Models\TypeGseModel;
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
            ['company_name' => 'PT. AEROFOOD CATERING SERVICE'],
            ['company_name' => 'PT. AFM AVIASI INDONESIA'],
            ['company_name' => 'PT. ANGKASA PURA SUPPORTS'],
            ['company_name' => 'PT. ASIA DIGITAL ENGINEERING INDONESIA'],
            ['company_name' => 'PT. AVIA TECHNICS DIRGANTARA'],
            ['company_name' => 'PT. CATHAY PACIFIC AIRLINES'],
            ['company_name' => 'PT. CELEBI AVIATION INDONESIA'],
            ['company_name' => 'PT. CITILINK INDONESIA'],
            ['company_name' => 'PT. ENGGANG ANGKASA SARANA'],
            ['company_name' => 'PT. GAPURA ANGKASA'],
            ['company_name' => 'PT. GARDA TAWANG REKSA INDONESIA'],
            ['company_name' => 'PT. GMF AERO ASIA'],
            ['company_name' => 'PT. IAS CARGO & LOGISTICS'],
            ['company_name' => 'PT. IAS FOOD SERVICES'],
            ['company_name' => 'PT. JAS AERO ENGINEERING SERVICES'],
            ['company_name' => 'PT. JASA ANGKASA SEMESTA'],
            ['company_name' => 'PT. KARISMA BAHANA AVIASI'],
            ['company_name' => 'PT. LION AIR'],
            ['company_name' => 'PT. NATRA ABADINUGRAHA UTAMA PUTRA'],
            ['company_name' => 'PT. PAREWA KATERING'],
            ['company_name' => 'PT. PERTAMINA (PERSERO)'],
            ['company_name' => 'PT. SARI RAHAYU BIOMANTARA'],
            ['company_name' => 'PT. SRIWIJAYA AIR'],
            ['company_name' => 'PT. TRANSNUSA AVIATION MANDIRI'],
        ];

        foreach ($perusahaan as $data) {
            CompanyGseModel::create($data);
        }

        // ################################################ Peralatan Seeder
        $peralatan = [
            ['type_name' => 'MOBIL/KENDARAAN OPERASIONAL'],
            ['type_name' => 'CATERING TRUCK (CTT)'],
            ['type_name' => 'AIRCRAFT TOWING TRACTOR (ATT)'],
            ['type_name' => 'LAVATORY SERVICE CART (LSC)'],
            ['type_name' => 'WATER SERVICE CART (WSC)'],
            ['type_name' => 'BAGGAGE CART (BCT)'],
            ['type_name' => 'MAINTENANCE STAIR'],
            ['type_name' => 'FIREX'],
            ['type_name' => 'TOWED PASSANGER STAIRS (TPS)'],
            ['type_name' => 'BAGGAGE TOWING TRACTOR (BTT)'],
            ['type_name' => 'AIRCRAFT TOWING BAR (ATB)'],
            ['type_name' => 'CREW TRANSPORTATION VEHICLE (CTV)'],
            ['type_name' => 'APRON PASSENGER BUS (APB)'],
            ['type_name' => 'COMPRESSOR WASHING'],
            ['type_name' => 'TANGGA TEKNIK'],
            ['type_name' => 'TOWBARLESS TRACTOR (TBT)'],
            ['type_name' => 'GROUND POWER UNIT/SYSTEM (GPU/GPS)'],
            ['type_name' => 'AIRSIDE OPERATION VEHICLE (AOV)'],
            ['type_name' => 'PASSENGER BOARDING STAIRS (PBS)'],
            ['type_name' => 'CONVEYOR BELT LOADER (CBL)'],
            ['type_name' => 'AIR CONDITIONING UNIT (ACU)'],
            ['type_name' => 'AIR STARTER UNIT/SYSTEM (ASU/ASS)'],
            ['type_name' => 'LAVATORY SERVICE TRUCK (LST)'],
            ['type_name' => 'WATER SERVICE TRUCK (WST)'],
            ['type_name' => 'PORTABLE GENSET (P-GNS)'],
            ['type_name' => 'PALLET DOLLIES (PDL)'],
            ['type_name' => 'CONTAINER DOLLIES (CDL)'],
            ['type_name' => 'HIGH LIFT LOADER (HLL)'],
            ['type_name' => 'FORKLIFT (FLT)'],
            ['type_name' => 'FUEL SERVICE TRUCK'],
            ['type_name' => 'MARSHALLING CAR'],
            ['type_name' => 'INCAPACITED PAX LOAD VEHICLE (IPL) / AMBULIFT'],
            ['type_name' => 'GENSET'],
            ['type_name' => 'PALLET RACK (PRK)'],
            ['type_name' => 'CONTAINER RACK (CRK)'],
            ['type_name' => 'BATTERY CART'],
            ['type_name' => 'MAINTENANCE UNIT TRUCK'],
            ['type_name' => 'NITROGEN CART'],
            ['type_name' => 'JACK CART'],
            ['type_name' => 'MAIN WHEEL CART'],
            ['type_name' => 'WASHING CART'],
            ['type_name' => 'HIGH LIFT CATERING TRUCK (HCT)'],
            ['type_name' => 'AXLE JACK'],
            ['type_name' => 'WHEEL CHANGER'],
            ['type_name' => 'FUEL BOWSER'],
            ['type_name' => 'WORKING STAIRS'],
            ['type_name' => 'BAGGAGE CARGO CART (BCC)'],
            ['type_name' => 'REFUELING DE-REFUELING TRUCK (RDT)'],
            ['type_name' => 'FUEL HYDRANT DISPENCER TRUCK (HDT)'],

        ];

        foreach ($peralatan as $data) {
            TypeGseModel::create($data);
        }

        $kategori = [
            ['category_name' => 'MOTORIZED'],
            ['category_name' => 'NON-MOTORIZED'],
        ];
        foreach ($kategori as $data) {
            CategoryGseModel::create($data);
        }

        $bahanBakar = [
            ['fuel_type_name' => 'PERTALITE/PERTAMAX'],
            ['fuel_type_name' => 'ELECTRIC VEHICLE'],
            ['fuel_type_name' => 'SOLAR'],
            ['fuel_type_name' => 'OTHERS'],
        ];
        foreach ($bahanBakar as $data) {
            FuelTypeModel::create($data);
        }

        $statusKepemilikan = [
            ['ownership_name' => 'Milik Perusahaan'],
            ['ownership_name' => 'Sewa/Sub Kontrak'],
        ];

        foreach ($statusKepemilikan as $data) {
            OwnershipTypeGseModel::create($data);
        }

        $kodeGh = [
            ['code_gh' => 'ACS'],
            ['code_gh' => 'AFM'],
            ['code_gh' => 'APS'],
            ['code_gh' => 'ADEI'],
            ['code_gh' => 'FLT'],
            ['code_gh' => 'CPA'],
            ['code_gh' => 'CAI'],
            ['code_gh' => 'CTV'],
            ['code_gh' => 'EAS'],
            ['code_gh' => 'GAPURA'],
            ['code_gh' => 'GTRI'],
            ['code_gh' => 'GMF'],
            ['code_gh' => 'IASC'],
            ['code_gh' => 'IASFS'],
            ['code_gh' => 'JAES'],
            ['code_gh' => 'JAS'],
            ['code_gh' => 'KBA'],
            ['code_gh' => 'LNI'],
            ['code_gh' => 'NATRA'],
            ['code_gh' => 'PAREWA'],
            ['code_gh' => 'PERTAMINA'],
            ['code_gh' => 'SRB'],
            ['code_gh' => 'SJY'],
            ['code_gh' => 'TNU'],
        ];

        foreach ($kodeGh as $data) {
            CodeGhModel::create($data);
        }

        $kodeGse = [
            ['code_gse' => 'AOV'],
            ['code_gse' => 'CTT'],
            ['code_gse' => 'ATT'],
            ['code_gse' => 'LSC'],
            ['code_gse' => 'WSC'],
            ['code_gse' => 'BCT'],
            ['code_gse' => 'AMS'],
            ['code_gse' => 'FIREX'],
            ['code_gse' => 'TPS'],
            ['code_gse' => 'BTT'],
            ['code_gse' => 'ATB'],
            ['code_gse' => 'CTV'],
            ['code_gse' => 'APB'],
            ['code_gse' => 'CDL'],
            ['code_gse' => 'TBT'],
            ['code_gse' => 'GPU'],
            ['code_gse' => 'PBS'],
            ['code_gse' => 'CBL'],
            ['code_gse' => 'ACU'],
            ['code_gse' => 'ASU'],
            ['code_gse' => 'LST'],
            ['code_gse' => 'P-GNS'],
            ['code_gse' => 'PDL'],
            ['code_gse' => 'HLL'],
            ['code_gse' => 'FLT'],
            ['code_gse' => 'HDT'],
            ['code_gse' => 'MSC'],
            ['code_gse' => 'IPL'],
            ['code_gse' => 'GNS'],
            ['code_gse' => 'PRK'],
            ['code_gse' => 'CRK'],
            ['code_gse' => 'OTHERS'],
            ['code_gse' => 'HCT'],
            ['code_gse' => 'BCC'],
            ['code_gse' => 'RDT'],
        ];
        foreach ($kodeGse as $data) {
            CodeGseModel::create($data);
        }
    }
}
