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
        Schema::create('penimbangan_anak', function (Blueprint $table) {
            $table->id_timbang();
            $table->bigint('id_dha');
            $table->bigint('id_anak');
            $table->bigint('id_vaksin');
            $table->string('penimbangan_bulan', 20);
            $table->date('id_jadwal');
            $table->string('nama_anak', 50);
            $table->string('jk', 10);
            $table->string('berat_badan', 5);
            $table->string('st', 5);
            $table->string('ket', 100);
            $table->timestamps();

            $table->foreign('id_dha')->references('id_dha')->on('daftar_hadibayi');
            $table->foreign('id_anak')->references('id_anak')->on('bayibalita');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('penimbangan_anak');
    }
};
