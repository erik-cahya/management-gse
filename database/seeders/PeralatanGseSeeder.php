<?php

namespace Database\Seeders;

use App\Models\PeralatanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeralatanGseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
