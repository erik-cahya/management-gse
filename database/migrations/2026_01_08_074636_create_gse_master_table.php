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
            $table->ulid('gse_id')->primary()->unique();
            $table->string('gse_serial')->nullable()->unique();
            $table->string('asset_number')->nullable();
            $table->string('vehicle_number')->nullable();

            $table->foreignUlid('company_id')->nullable()->references('company_id')->on('company_gse')->nullOnDelete();
            $table->foreignUlid('type_id')->nullable()->references('type_id')->on('type_gse')->nullOnDelete();
            $table->string('brand')->nullable();
            $table->foreignUlid('category_id')->nullable()->references('category_id')->on('category_gse')->nullOnDelete();
            $table->foreignUlid('fuel_type')->nullable()->references('fuel_id')->on('fuel_type_gse')->nullOnDelete();
            $table->float('length')->nullable();
            $table->float('width')->nullable();
            $table->float('area')->nullable();
            $table->integer('manufacture_year')->nullable();
            $table->foreignUlid('ownership_type')->nullable()->references('ownership_type_id')->on('ownership_type_gse')->nullOnDelete();
            $table->text('rental_company')->nullable();
            $table->string('rental_status')->nullable();
            $table->date('rental_date')->nullable();

            $table->foreignUlid('code_gh')->nullable()->references('code_gh_id')->on('code_gh')->nullOnDelete();
            $table->foreignUlid('code_gse')->nullable()->references('code_gse_id')->on('code_gse')->nullOnDelete();

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
