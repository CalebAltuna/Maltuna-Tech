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
        Schema::create('sarrera', function (Blueprint $table) {
            // Primary Key
            $table->id('id_sarrera');

            $table->date('data_erosketa');
            $table->integer('kantitatea');

            // FK erabiltzailea
            $table->unsignedBigInteger('id_erabiltzailea')->nullable();
            $table->foreign('id_erabiltzailea')
                  ->references('id_erabiltzailea')
                  ->on('erabiltzailea')
                  ->onDelete('set null');

            // FK ekitaldia
            $table->unsignedBigInteger('id_ekitaldia')->nullable();
            $table->foreign('id_ekitaldia')
                  ->references('id_ekitaldia')
                  ->on('ekitaldia')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarrera');
    }
};
