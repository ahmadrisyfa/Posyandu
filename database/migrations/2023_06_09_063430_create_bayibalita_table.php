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
        Schema::create('bayibalita', function (Blueprint $table) {
            $table->id_anak();
            $table->string('nik_anak'); 
            $table->string('no_kk');
            $table->string('nama_anak', 50);
            $table->string('jk', 10);
            $table->integer('tgl_lahir');
            $table->string('nama_ayah', 50);
            $table->string('nama_ibu', 50);
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
        Schema::dropIfExists('bayibalita');
    }
};
