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
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->string('sepatu')->comment('Nama sepatu');
            $table->integer('size')->comment('Ukuran sepatu');
            $table->string('brand')->comment('Merek sepatu');
            $table->string('kategori')->comment('Kategori sepatu');
            $table->decimal('harga', 10, 2)->comment('Harga sepatu'); // Format harga (max 10 digit, 2 desimal)
            $table->integer('quantity')->comment('Jumlah sepatu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
