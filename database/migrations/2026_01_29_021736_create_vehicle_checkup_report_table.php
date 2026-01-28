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
        Schema::create('vehicle_checkup_report', function (Blueprint $table) {
            $table->ulid('vehicle_checkup_report_id');
            $table->foreignUlid('vehicle_checkup_id')->references('vehicle_checkup_id')->on('vehicle_checkup')->cascadeOnDelete();
            $table->foreignUlid('checkup_list_id')->nullable()->references('checkup_list_id')->on('vehicle_checkup_list')->cascadeOnDelete();
            $table->string('additional_name')->nullable();
            $table->text('additional_note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_checkup_report');
    }
};
