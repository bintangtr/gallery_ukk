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
        Schema::create('komentarfoto', function (Blueprint $table) {
            $table->bigIncrements('komentar_id');
            $table->unsignedBigInteger('foto_id');
            $table->unsignedBigInteger('user_id');
            $table->text('isi_komentar')->nullable();
            $table->date('tanggal_komentar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentarfoto');
    }
};
