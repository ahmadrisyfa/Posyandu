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
        Schema::create('daftar_hadirbayi', function (Blueprint $table) {
            $table->id_dha();
            $table->bigint('id_anak', 20);
            $table->date('id_jadwal');
            $table->string('status', 20);
            $table->string('ket', 100);
            $table->timestamps();

            $table->foreign('id_anak')->references('id_anak')->on('bayibalita');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('daftar_hadirbayi');
    }
};
