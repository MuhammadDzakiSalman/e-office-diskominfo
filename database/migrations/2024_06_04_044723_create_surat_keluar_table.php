<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id('id_surat_keluar', 5);
            $table->string('no_surat_keluar', 60);
            $table->string('judul_surat_keluar', 100);
            $table->string('jenis_surat', 100);
            $table->string('tujuan', 60);
            $table->date('tanggal_keluar');
            $table->string('berkas_surat_keluar');
            $table->mediumText('keterangan');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('surat_keluar');
    }
};
