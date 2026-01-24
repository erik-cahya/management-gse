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
        Schema::create('violation_sanctions', function (Blueprint $table) {
            $table->ulid('violation_sanction_id')->primary()->unique();
            $table->foreignUlid('violation_report_id')->references('violation_report_id')->on('violation_reports')->cascadeOnDelete();
            $table->foreignUlid('sanction_id')->references('sanction_id')->on('sanctions')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violation_sanctions');
    }
};
