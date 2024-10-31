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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul promosi
            $table->text('description')->nullable(); // Deskripsi promosi
            $table->decimal('discount', 5, 2); // Diskon dalam persen
            $table->date('start_date'); // Tanggal mulai promosi
            $table->date('end_date'); // Tanggal akhir promosi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
