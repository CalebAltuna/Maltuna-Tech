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
        Schema::create('ekitaldia', function (Blueprint $table) {
            // Primary Key
            $table->id('id_ekitaldia');

            $table->string('izenburu');
            $table->text('deskripzioa')->nullable();
            $table->integer('aforo');
            $table->integer('aforo_libre')->nullable();
            $table->string('egoera');

            // Foreign Key
            $table->foreignId('id_sortzaile')->constrained('erabiltzailea')->onDelete('cascade');


            $table->date('data_erosketa')->nullable();
            $table->integer('prezio_sarrera')->nullable();
            $table->string('irudia')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekitaldia');
    }
};
