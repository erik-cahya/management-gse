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
            $table->string('gse_serial')->unique();
            $table->string('nomor_asset');
            $table->string('nopol_kendaraan');

            $table->foreignUlid('perusahaan_id')->references('perusahaan_id')->on('perusahaan')->cascadeOnDelete();
            $table->foreignUlid('type_peralatan_gse')->references('peralatan_id')->on('peralatan')->cascadeOnDelete();
            $table->string('merk');
            $table->foreignUlid('kategori')->references('kategori_id')->on('kategori')->cascadeOnDelete();
            $table->foreignUlid('bahan_bakar')->references('bahan_bakar_id')->on('bahan_bakar')->cascadeOnDelete();
            $table->float('panjang');
            $table->float('lebar');
            $table->float('luas');
            $table->integer('manufacture_year');
            $table->foreignUlid('status_kepemilikan')->references('kepemilikan_id')->on('kepemilikan')->cascadeOnDelete();
            $table->text('perusahaan_sewa')->nullable();
            $table->string('status_sewa')->nullable();
            $table->date('tanggal_sewa')->nullable();

            $table->foreignUlid('kode_gh')->references('kode_gh_id')->on('kode_gh')->cascadeOnDelete();
            $table->foreignUlid('kode_gse')->references('kode_gse_id')->on('kode_gse')->cascadeOnDelete();

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
