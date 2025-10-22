<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('erabiltzailea', function (Blueprint $table) {
            // Primary Key
            $table->id('id_erabiltzailea');
            //oinarrrizko atributuak
            $table->string('izena');
            $table->string('abizena');
            $table->enum('mota', ['langilea', 'admin', 'arrunta'])->default('arrunta'); 
            $table->string('email')->unique();
            $table->string('password');

            // FK admin (erlazioa bere buruarekin)
            $table->unsignedBigInteger('id_sortzailea')->nullable();
            $table->foreign('id_sortzailea')
                ->references('id_erabiltzailea')
                ->on('erabiltzailea')
                ->onDelete('set null');

            //hainbat metodo erabilgarri
            $table->timestamp('email_verified_at')->nullable();//emaila baieztatzeko
            $table->rememberToken();//sesio iraunkorra egiteko
            $table->timestamps();//created at eta updated at automatikoki kudeatzeko
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
