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
        Schema::create('vehicle_checkup', function (Blueprint $table) {
            $table->ulid('vehicle_checkup_id')->primary()->unique();
            $table->string('no_sticker');
            $table->text('vehicle_type');
            $table->text('vehicle_number');
            $table->text('company');
            $table->text('staff_auditor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_checkup');
    }
};
