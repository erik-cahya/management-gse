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
        Schema::create('gse_inspections', function (Blueprint $table) {
            $table->id();
            $table->string('gse_serial')->comment('FK to gse_master | gse_serial');
            $table->unsignedBigInteger('user_id')->comment('FK to users | id');
            $table->date('examination_date');
            $table->string('employee');
            $table->string('location');
            $table->timestamps();

            $table->foreign('gse_serial')->references('gse_serial')->on('gse_master')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gse_inspections');
    }
};
