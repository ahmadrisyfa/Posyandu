<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pemeriksaan_ibu', function (Blueprint $table) {
            $table->id_periksa();
            $table->bigint('id_dhi');
            $table->bigint('id_vaksin');
            $table->date('id_jadwal');
            $table->bigint('id_ibu');
            $table->string('nama_ibu', 50);
            $table->string('berat_badan', 5);
            $table->string('tinggi_badan', 5);
            $table->string('lila_imt', 10);
            $table->string('hb_goldarah', 10);
            $table->string('tensi', 7);
            $table->string('id_obat',11);
            $table->integer('jumlah');
            $table->string('ket', 100);
            $table->timestamps();

            $table->foreign('id_dhi')->references('id_dhi')->on('daftar_hadiribu');
            $table->foreign('id_ibu')->references('id_ibu')->on('ibuhamil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('pemeriksaan_ibu');
    }
};
