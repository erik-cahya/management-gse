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
        Schema::create('violation_reports', function (Blueprint $table) {
            $table->ulid('violation_report_id')->primary()->unique();
            $table->date('incident_date');
            $table->time('incident_time');
            $table->string('incident_location');
            $table->string('remarks')->nullable();
            $table->foreignUlid('created_by')->references('ref')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violation_reports');
    }
};
