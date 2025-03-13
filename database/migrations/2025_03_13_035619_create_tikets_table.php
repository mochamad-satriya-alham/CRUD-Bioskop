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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id');
            $table->enum('studio', ['1', '2', '3', '4']);
            $table->enum('showtime', ['12:00', '15:00', '19:00']);
            $table->enum('type', ['Regular', 'VIP']);
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
