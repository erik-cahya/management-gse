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
            $table->unsignedBigInteger('inspection_id')->comment('FK to gse_inspection | id');
            $table->string('violation_name');
            $table->string('violation_type');
            $table->string('violation_level');
            $table->text('description');
            $table->timestamps();

            $table->foreign('gse_serial')->references('gse_serial')->on('gse_master')->onDelete('cascade');
            $table->foreign('inspection_id')->references('id')->on('gse_inspections')->onDelete('cascade');
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
