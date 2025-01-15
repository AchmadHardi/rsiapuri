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
        Schema::create('jurnal_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jurnal')->unique();
            $table->text('keterangan')->nullable();
            $table->date('tanggal');
            $table->string('kode_rekening');
            $table->text('uraian_transaksi');
            $table->string('kel_tujuan');
            $table->string('tujuan');
            $table->string('referensi')->nullable();
            $table->string('pemasok')->nullable();
            $table->string('department')->nullable();
            $table->decimal('debet', 15, 2)->default(0);
            $table->decimal('kredit', 15, 2)->default(0);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('jurnal_transaksi');
    }
};
