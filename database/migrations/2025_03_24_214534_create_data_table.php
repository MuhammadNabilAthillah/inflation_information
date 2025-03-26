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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->integer('bulan');
            $table->integer('minggu');
            $table->integer('harga');
            $table->float('inflasi');
            $table->unsignedBigInteger('id_sektor');
            $table->foreign('id_sektor')->references('id')->on('sektor');
            $table->unsignedBigInteger('id_komoditas');
            $table->foreign('id_komoditas')->references('id')->on('komoditas');
            $table->unsignedBigInteger('id_klasifikasi');
            $table->foreign('id_klasifikasi')->references('id')->on('klasifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
