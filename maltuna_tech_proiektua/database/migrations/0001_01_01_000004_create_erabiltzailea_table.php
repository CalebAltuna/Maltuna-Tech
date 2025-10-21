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
        Schema::create('erabiltzailea', function (Blueprint $table) {
            // Primary Key
            $table->id('id_erabiltzailea');

            $table->string('izena');
            $table->string('abizena');
            $table->string('mota');
            $table->string('korreoa');
            $table->string('pasahitza');

            // FK admin
            $table->unsignedBigInteger('id_sortzailea')->nullable();
            $table->foreign('id_sortzailea')
                  ->references('id_erabiltzailea')
                  ->on('erabiltzailea')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('erabiltzailea');
    }
};
