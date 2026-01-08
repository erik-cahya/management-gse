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
        Schema::create('gse_master', function (Blueprint $table) {
            $table->id();
            $table->string('gse_serial')->unique();
            $table->string('gse_type');
            $table->string('operator');
            $table->string('operation_area');
            $table->boolean('status')->comment('1:active | 0:not active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gse_master');
    }
};
