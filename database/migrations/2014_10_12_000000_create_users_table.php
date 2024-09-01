<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user', 1);
            $table->string('nama_lengkap', 100);
            $table->string('username', 100);
            $table->string('password', 100);
            $table->enum('level', ['user', 'admin'])->default('user')->nullable();
            $table->string('bio', 512);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
