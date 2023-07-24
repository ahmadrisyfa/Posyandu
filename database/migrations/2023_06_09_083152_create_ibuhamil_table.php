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
        Schema::create('ibuhamil', function (Blueprint $table) {
            $table->id_ibu();
            $table->string('nik_ibu', 16);
            $table->string('no_kk', 16);
            $table->string('nama_ibu', 50);
            $table->date('tgl_lahir');
            $table->varchar('hamil_ke');
            $table->date('hpht');
            $table->string('nama_suami', 50);
            $table->string('alamat', 50);
            $table->string('kia', 5);
            $table->string('ket', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('ibuhamil');
    }
};
