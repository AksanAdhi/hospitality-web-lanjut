<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('medicine_name');
            $table->integer('quantity');
            $table->date('expiry_date');
            $table->timestamps();
        });
    }

    /**
     * Hapus migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
