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
        Schema::create('gse_violations', function (Blueprint $table) {
            $table->id();
            $table->string('gse_serial')->comment('FK to gse_master | gse_serial');

            $table->string('employee');
            $table->string('location');
            $table->string('examination_date')->comment('tanggal_pengecekan');

            $table->string('violation_name');
            $table->string('violation_type');
            $table->string('violation_level');
            $table->text('description');
            $table->timestamps();

            $table->foreign('gse_serial')->references('gse_serial')->on('gse_master')->onDelete('cascade');
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
