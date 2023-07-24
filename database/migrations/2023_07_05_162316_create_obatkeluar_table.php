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
        Schema::create('obatkeluar', function (Blueprint $table) {
            $table->id_OK();
            $table->bigint('id_obat');
            $table->date('tgl_keluar');
            $table->integer('jumlah');
            $table->string('ket, 100');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obatkeluar');
    }
};
