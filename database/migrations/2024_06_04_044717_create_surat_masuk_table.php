<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id('id_surat_masuk');
            $table->string('no_surat_masuk', 60);
            $table->string('judul_surat_masuk', 100);
            $table->string('jenis_surat', 100);
            $table->string('asal_surat', 60);
            $table->date('tanggal_masuk');
            // $table->date('tanggal_diterima');
            $table->string('berkas_surat_masuk', 255)->nullable();
            $table->mediumText('keterangan')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('surat_masuk');
    }
};
