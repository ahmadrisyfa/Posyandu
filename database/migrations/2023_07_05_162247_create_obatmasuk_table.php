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
        Schema::create('obatmasuk', function (Blueprint $table) {
            $table->id_OM();
            $table->bigint('id_obat');
            $table->date('tgl_masuk');
            $table->integer('jumlah');
            $table->date('tgl_ed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obatmasuk');
    }
};
