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
        if (!Schema::hasTable('karyawans')) {
            Schema::create('karyawans', function (Blueprint $table) {
                $table->id(); // Kolom primary key
                $table->string('nama'); // Kolom untuk nama karyawan
                $table->string('username')->unique(); // Kolom untuk username karyawan
                $table->string('password'); // Kolom untuk password karyawan
                $table->foreignId('unit_id')->constrained('units')->onDelete('cascade'); // Kolom foreign key ke tabel units
                $table->foreignId('jabatan_id')->constrained('jabatans')->onDelete('cascade'); // Kolom foreign key ke tabel jabatans
                $table->date('tanggal_bergabung'); // Kolom untuk tanggal bergabung
                $table->timestamps(); // Kolom timestamp untuk created_at dan updated_at
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('jabatan_karyawan');
        Schema::dropIfExists('karyawans');
    }
};
