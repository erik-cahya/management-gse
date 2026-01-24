<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('violators', function (Blueprint $table) {
            $table->ulid('violator_id')->primary()->unique();
            $table->string('full_name');
            $table->string('company_name');
            $table->string('airport_pass_number');
            $table->string('airport_pass_type');
            $table->string('tim_number');
            $table->string('tim_type');
            $table->string('license_type');
            $table->string('license_number');
            $table->string('vehicle_plate_number');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gse_violations');
    }
};
