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
        Schema::create('skor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_olahraga');
            $table->foreign('id_olahraga')->references('id')->on('olahraga')->onDelete('cascade');
            $table->text('nama');
            $table->integer('skor');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skor');
    }
};
