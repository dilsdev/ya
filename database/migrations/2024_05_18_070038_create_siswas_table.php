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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nama_lengkap');
            $table->string('status');
            $table->integer('nisn');
            $table->date('tanggal_lahir');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('alamat');
            $table->string('image_kp');
            $table->string('profile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
