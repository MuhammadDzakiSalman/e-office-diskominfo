<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('disposisi', function (Blueprint $table) {
            $table->id('id_disposisi');
            $table->unsignedBigInteger('surat_masuk_id');
            $table->foreign('surat_masuk_id')->references('id_surat_masuk')->on('surat_masuk')->onDelete('cascade'); // Definisikan kunci asing
            $table->string('pengisi', 50);
            $table->string('tujuan', 250);
            $table->string('instruksi', 300);
            $table->string('catatan', 200);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('disposisi');
    }
};
