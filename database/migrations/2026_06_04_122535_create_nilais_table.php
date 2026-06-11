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
    Schema::create('nilais', function (Blueprint $table) {
        $table->id();
        $table->string('nim');
        $table->string('nama');        // 👈 Ubah dari 'nama_mahasiswa' menjadi 'nama'
        $table->string('mata_kuliah');
        $table->integer('nilai');      // 👈 Ubah dari 'nilai_angka' menjadi 'nilai'
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
