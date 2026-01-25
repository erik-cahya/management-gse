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
            $table->foreignUlid('gse_id')->references('gse_id')->on('gse_master')->cascadeOnDelete();
            $table->string('full_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('airport_pass_number')->nullable();
            $table->string('airport_pass_type')->nullable();
            $table->string('tim_number')->nullable();
            $table->string('tim_type')->nullable();
            $table->string('license_type')->nullable();
            $table->string('license_number')->nullable();
            $table->string('vehicle_plate_number')->nullable();
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
