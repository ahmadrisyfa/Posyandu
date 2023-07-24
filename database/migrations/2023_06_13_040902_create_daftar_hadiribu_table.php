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
        Schema::create('daftar_hadiribu', function (Blueprint $table) {
            $table->id_dhi();
            $table->bigint('id_ibu');
            $table->date('id_jadwal');
            $table->string('nama_ibu', 50);
            $table->string('status', 20);
            $table->string('ket', 100);
            $table->timestamps();

            $table->foreign('id_ibu')->references('id_ibu')->on('ibuhamil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('daftar_hadiribu');
    }
};
