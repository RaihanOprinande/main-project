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
        Schema::create('shoes', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->char('harga');
            $table->foreignId('kategori_id');
            $table->foreignId('gambar_id');
            $table->integer('merek_id');
            $table->integer('color_id');
            $table->integer('36');
            $table->integer('37');
            $table->integer('38');
            $table->integer('39');
            $table->integer('40');
            $table->integer('41');
            $table->integer('42');
            $table->integer('43');
            $table->integer('44');
            $table->integer('45');
            $table->integer('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoes');
    }
};
