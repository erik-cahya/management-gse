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
        Schema::create('violation_reports_details', function (Blueprint $table) {
            $table->ulid('violation_report_detail_id')->primary()->unique();
            $table->foreignUlid('violation_report_id')->references('violation_report_id')->on('violation_reports')->cascadeOnDelete();
            $table->foreignUlid('violation_type_id')->references('violation_type_id')->on('violation_types')->cascadeOnDelete();
            $table->text('additional_note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violation_reports_details');
    }
};
