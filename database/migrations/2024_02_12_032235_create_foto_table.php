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
        Schema::create('foto', function (Blueprint $table) {
            $table->bigIncrements('foto_id');
            $table->unsignedBigInteger('user_id');
            $table->string('judul_foto', 255);
            $table->text('deskripsi_foto')->nullable();
            $table->unsignedBigInteger('album_id')->nullable();
            $table->string('lokasi_file', 255);
            $table->date('tanggal_unggah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto');
    }
};
